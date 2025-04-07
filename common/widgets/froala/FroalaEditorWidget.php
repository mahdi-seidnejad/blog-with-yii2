<?php

namespace common\widgets\froala;

use froala\froalaeditor\FroalaEditorWidget as BaseFroalaEditorWidget;

class FroalaEditorWidget extends BaseFroalaEditorWidget
{

    /**
     * Define widget default client options
     * 
     * @return array
     */
    protected function getDefaultClientOptions()
    {
        return [
            'toolbarInline' => false,
            'theme' => 'royal',
            'language' => 'fa',
            'heightMin' => '350px',
            'direction' => 'rtl',
            'pluginsEnabled' => ['align', 'fontFamily', 'fontSize', 'wordPaste', 'charCounter', 'colors', 'embedly', 'emoticons', 'entities', 'fullscreen'],
            'fontFamily' => [
                'IRANSansWebFaNum' => 'ایرانسنس',
                'Vazirmatn' => 'وزیر',
                'B Roya' => 'رویا',
                'B Titr' => 'تیتر',
                'B Lotus' => 'لوتوس',
                'B Nazanin' => 'نازنین',
                'IranNastaliq' => 'نستعلیق',
            ],
            'fontFamilySelection' => true
        ];
    }

    public function run()
    {
        $this->clientOptions = array_merge_recursive($this->getDefaultClientOptions(), $this->clientOptions);

        $view = $this->getView();
        FroalaEditorWidgetAsset::register($view);

        parent::run();
    }
}
