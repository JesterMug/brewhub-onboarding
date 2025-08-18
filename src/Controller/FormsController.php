<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Forms Controller
 *
 * @property \App\Model\Table\FormsTable $Forms
 */
class FormsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Forms->find();
        $forms = $this->paginate($query);

        $this->set(compact('forms'));
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, contain: []);
        $this->set(compact('form'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = $this->Forms->newEmptyEntity();
        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $this->set(compact('form'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Mark as replied method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mark($id = null)
    {
        $form = $this->Forms->get($id);
        if ($form->replied_to) {
            $this->Flash->error(__('The form has already been marked.'));
        } else {
            $form->replied_to = true;
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been marked.'));
            } else {
                $this->Flash->error(__('The form could not be marked. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $form = $this->Forms->get($id);
        if ($this->Forms->delete($form)) {
            $this->Flash->success(__('The form has been deleted.'));
        } else {
            $this->Flash->error(__('The form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
