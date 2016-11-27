<?php

/**
 * Rewrite Core Messages block
 *
 * @category   NoName
 * @package    NoName_ManageMessages
 * @author
 */
class NoName_ManageMessages_Block_Core_Messages extends Mage_Core_Block_Messages
{


    /**
     * Retrieve messages array by message type, check if type of message is allow return it.
     * If option in admin dosen't selected call parent function/
     *
     * @param   string $type
     * @return  array
     */
    public function getMessages($type=null)
    {
        /**
         * Always allow all messages for backend
         */
        if(Mage::app()->getStore()->isAdmin()) {
            return $this->getMessageCollection()->getItems($type);
        }

        /**
         * Check if current session message is alloed to show, only for frontend
         */
        $allowedSysMsg = explode(',', Mage::getStoreConfig('managemessages/general/allowed', Mage::app()->getStore()->getStoreId()));

        if(
            !Mage::getStoreConfigFlag('managemessages/general/dissalow', Mage::app()->getStore()->getStoreId()) &&
            is_array($allowedSysMsg)
            ) {

            if(in_array($type, $allowedSysMsg)) {

                return $this->getMessageCollection()->getItems($type);
            }
        }
    }

}
