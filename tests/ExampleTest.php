<?php

use App\User;
use App\Task;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;


    public function test_i_am_redirect_to_login_if_i_try_to_view_task_lists_without_logging_in()
    {
        $this->visit('/tasks')->see('Login');
    }


    public function test_i_can_create_an_account()
    {
        $this->visit('/auth/register')
            ->type('Taylor Otwell', 'name')
            ->type('taylor@laravel.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/tasks')
            ->seeInDatabase('users', ['email' => 'taylor@laravel.com']);
    }


    public function test_authenticated_users_can_create_tasks()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/tasks')
             ->type('Task 1', 'name')
             ->press('Add Task')
             ->see('Task 1')
             ->seeInDatabase('tasks', ['name' => 'Task 1']);
    }


    public function test_users_can_delete_a_task()
    {
        $user = factory(User::class)->create();

        $user->tasks()->save($taskOne = factory(Task::class)->create());
        $user->tasks()->save($taskTwo = factory(Task::class)->create());

        $this->actingAs($user)
             ->visit('/tasks')
             ->see($taskOne->name)
             ->see($taskTwo->name)
             ->press('delete-task-'.$taskOne->id)
             ->dontSee($taskOne->name)
             ->see($taskTwo->name);
    }


    public function test_users_cant_view_tasks_of_other_users()
    {
        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $userOne->tasks()->save($taskOne = factory(Task::class)->create());
        $userTwo->tasks()->save($taskTwo = factory(Task::class)->create());

        $this->actingAs($userOne)
             ->visit('/tasks')
             ->see($taskOne->name)
             ->dontSee($taskTwo->name);
    }


    public function test_users_cant_delete_tasks_of_other_users()
    {
        $this->withoutMiddleware();

        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $userOne->tasks()->save($taskOne = factory(Task::class)->create());
        $userTwo->tasks()->save($taskTwo = factory(Task::class)->create());

        $this->actingAs($userOne)
             ->delete('/task/'.$taskTwo->id)
             ->assertResponseStatus(403);
    }
}
