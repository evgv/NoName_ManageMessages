<?php

/**
 * Extends Core Message model
 *
 * @category   NoName
 * @package    NoName_ManageMessages
 */

class NoName_ManageMessages_Model_Message extends Mage_Core_Model_Message
{
    /**
     * Create an option array of system messages types
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => self::ERROR,
                'label' => self::ERROR
            ),

            array(
                'value' => self::WARNING,
                'label' => self::WARNING
            ),

            array(
                'value' => self::NOTICE,
                'label' => self::NOTICE
            ),

            array(
                'value' => self::SUCCESS,
                'label' => self::SUCCESS
            )
        );
    }
}
