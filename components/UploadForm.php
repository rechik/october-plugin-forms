<?php

    namespace Martin\Forms\Components;

    use Lang;
    use October\Rain\Filesystem\Definitions;
    use Martin\Forms\Classes\MagicForm;
    use Martin\Forms\Models\Record;

    class UploadForm extends MagicForm {

        use \Martin\Forms\Traits\FileUploader;

        public function componentDetails() {
            return [
                'name'        => 'martin.forms::lang.components.upload_form.name',
                'description' => 'martin.forms::lang.components.upload_form.description',
            ];
        }

        public function init() {
            $this->fileTypes       = $this->processFileTypes(true);
            $this->maxSize         = $this->property('maxSize');
            $this->placeholderText = $this->property('placeholderText');
            $this->setProperty('deferredBinding', 1);
            $this->bindModel('files', new Record);
        }

        public function defineProperties() {
            $local = [
                'placeholderText' => [
                    'title'             => 'martin.forms::lang.components.shared.uploader_pholder.title',
                    'description'       => 'martin.forms::lang.components.shared.uploader_pholder.description',
                    'default'           => Lang::get('martin.forms::lang.components.shared.uploader_pholder.default'),
                    'type'              => 'string',
                    'group'             => 'martin.forms::lang.components.shared.group_uploader',
                    'showExternalParam' => false,
                ],
                'maxSize' => [
                    'title'             => 'martin.forms::lang.components.shared.uploader_maxsize.title',
                    'description'       => 'martin.forms::lang.components.shared.uploader_maxsize.description',
                    'default'           => '5',
                    'type'              => 'string',
                    'group'             => 'martin.forms::lang.components.shared.group_uploader',
                    'showExternalParam' => false,
                ],
                'uploader_types' => [
                    'title'             => 'martin.forms::lang.components.shared.uploader_types.title',
                    'description'       => 'martin.forms::lang.components.shared.uploader_types.description',
                    'default'           => Definitions::get('defaultExtensions'),
                    'type'              => 'stringList',
                    'group'             => 'martin.forms::lang.components.shared.group_uploader',
                    'showExternalParam' => false,
                ],
            ];
            return array_merge(parent::defineProperties(), $local);
        }

    }

?>