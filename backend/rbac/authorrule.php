<?php

namespace backend\rbac;

use yii\rbac\Item;
use yii\rbac\Rule;
use Yii;

class AuthorRule extends Rule
{
    public $name = 'admin';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}