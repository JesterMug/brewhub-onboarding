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
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['add']);
    }

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
    public function view(?string $id = null)
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
        $session = $this->request->getSession();

        if ($this->request->is('post')) {
            $postedAnswer = trim((string)$this->request->getData('captcha_answer'));
            $realAnswer = (string)$session->read('captcha.answer');

            if ($realAnswer === '' || strcasecmp($postedAnswer, $realAnswer) !== 0) {
                $this->Flash->error(__('Captcha is incorrect. Please try again.'));
                $this->seedCaptcha();
                $this->set(compact('form'));

                return;
            }

            $data = $this->request->getData();
            unset($data['captcha_answer']);

            $form = $this->Forms->patchEntity($form, $data);
            if ($this->Forms->save($form)) {
                $session->delete('captcha.answer');
                $session->delete('captcha.question');

                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'add']);
            }

            $this->Flash->error(__('The form could not be sent. Please, try again.'));
            $this->seedCaptcha();
        } else {
            $this->seedCaptcha();
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
    public function mark(?string $id = null)
    {
        $form = $this->Forms->get($id);
        if ($form->replied_to) {
            $form->replied_to = false;
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been unmarked.'));
            } else {
                $this->Flash->error(__('The form could not be unmarked. Please, try again.'));
            }
        } else {
            $form->replied_to = true;
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been marked.'));
            } else {
                $this->Flash->error(__('The form could not be marked. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'view', $id]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null)
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

    private function seedCaptcha(): void
    {
        $a = random_int(1, 9);
        $b = random_int(1, 9);
        $this->request->getSession()->write('captcha.question', "$a + $b = ?");
        $this->request->getSession()->write('captcha.answer', (string)($a + $b));
    }
}
