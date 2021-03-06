<?php

namespace Itstructure\RbacModule\interfaces;

use yii\base\Model;
use yii\rbac\ManagerInterface;

/**
 * Interface ValidateComponentInterface
 *
 * @package Itstructure\RbacModule\interfaces
 */
interface ValidateComponentInterface
{
    /**
     * Set auth manager.
     *
     * @param ManagerInterface $authManager
     */
    public function setAuthManager(ManagerInterface $authManager): void;

    /**
     * Get auth manager.
     *
     * @return ManagerInterface
     */
    public function getAuthManager(): ManagerInterface;

    /**
     * Search model data.
     *
     * @param $model Model
     *
     * @return ModelInterface
     */
    public function setModel(Model $model): ModelInterface;
}
