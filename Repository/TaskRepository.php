<?php

namespace GreenFrog\Bundle\TodoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
    public function toggleActive($task) {
       $task->getActive() ? $task->setActive(false) : $task->setActive(true);
    }
    
    public function getTasksList($user) {
        if($user->hasRole('ROLE_SUPER_ADMIN')) {
            //- We can do a findAll, but lets order to put admin's tasks in end of list
            // TODO : change findAll when implement admin's tasks
            $tasks = $this->_em->getRepository("GreenFrogTodoBundle:User")->findAll();
        } else {
            $tasks[] = $this->_em->getRepository("GreenFrogTodoBundle:User")->find($user->getId());
        }
        return $tasks;
    }
}