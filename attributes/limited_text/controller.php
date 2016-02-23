<?php

namespace Concrete\Package\AttributeLimitedText\Attribute\LimitedText;

use Database;
use Core;
use Concrete\Core\Attribute\DefaultController;

class Controller extends DefaultController
{
    private $tableName = 'atLimitedText';

    public function type_form()
    {
        $this->set('form', Core::make('helper/form'));
        $this->load();
    }

    public function load()
    {
        $ak = $this->getAttributeKey();
        $db = Database::connection();

        if (is_object($ak)) {
            $row = $db->GetRow('SELECT * FROM ' . $this->tableName . ' WHERE akID = ?', array($ak->getAttributeKeyID()));
            foreach ($row as $item => $value) {
                $this->set($item, $value);
            }
        }
    }

    public function saveKey($data)
    {
        $ak = $this->getAttributeKey();
        $db = Database::connection();

        $db->Replace($this->tableName, [
            'akID' => $ak->getAttributeKeyID(),
            'maxLength' => $data['maxLength'],
            'showCounter' => $data['showCounter'],
        ], ['akID'], true);
    }

    public function form()
    {
        $this->load();

        $value = '';
        if (is_object($this->attributeValue)) {
            $value = Core::make('helper/text')->entities($this->getAttributeValue()->getValue());
        }

        $this->set('value', $value);
    }

    public function composer()
    {
        $this->form();
    }

}
