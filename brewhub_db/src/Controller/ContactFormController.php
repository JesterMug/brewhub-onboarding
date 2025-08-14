<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contactform Controller
 *
 * @property \App\Model\Table\ContactformTable $Contactform
 */
class ContactformController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contactform->find();
        $contactform = $this->paginate($query);

        $this->set(compact('contactform'));
    }

    /**
     * View method
     *
     * @param string|null $id Contactform id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactform = $this->Contactform->get($id, contain: []);
        $this->set(compact('contactform'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactform = $this->Contactform->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactform = $this->Contactform->patchEntity($contactform, $this->request->getData());
            if ($this->Contactform->save($contactform)) {
                $this->Flash->success(__('The contactform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contactform could not be saved. Please, try again.'));
        }
        $this->set(compact('contactform'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contactform id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactform = $this->Contactform->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactform = $this->Contactform->patchEntity($contactform, $this->request->getData());
            if ($this->Contactform->save($contactform)) {
                $this->Flash->success(__('The contactform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contactform could not be saved. Please, try again.'));
        }
        $this->set(compact('contactform'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contactform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactform = $this->Contactform->get($id);
        if ($this->Contactform->delete($contactform)) {
            $this->Flash->success(__('The contactform has been deleted.'));
        } else {
            $this->Flash->error(__('The contactform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
