<?php
namespace Craft;

class CkEditorFieldType extends BaseFieldType
{
    // Public Methods
    // =========================================================================

    public function getName()
    {
        return Craft::t('Rich Text (CKEditor)');
    }

    public function defineContentAttribute()
    {
        return array(AttributeType::String, 'column' => ColumnType::Text);
    }

    public function getInputHtml($name, $value)
    {
        $id = craft()->templates->formatInputId($name);
        $namespaceId = craft()->templates->namespaceInputId($name);

        craft()->templates->includeJsResource('ckeditor/lib/ckeditor/ckeditor.js');
        craft()->templates->includeCssResource('ckeditor/css/ckeditor.css');

        craft()->templates->includeJs("ClassicEditor.create(document.getElementById('" . $namespaceId . "'));");

        return craft()->templates->render('ckeditor/input', array(
            'id' => $id,
            'name'  => $name,
            'value' => $value,
        ));
    }
}
