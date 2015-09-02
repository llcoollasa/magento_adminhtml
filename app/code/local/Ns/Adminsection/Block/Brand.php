<?php
class Ns_Adminsection_Block_Brand extends Mage_Core_Block_Template  implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $collection = Mage::getResourceModel('ns_adminsection/brand_collection');

        $html = '<div id="widget-topsearches-container">' ;
        $html .= '<div class="widget-topsearches-title">Top Search Terms</div>';

        foreach($collection as $search){
            $html .= '<div class="widget-topsearches-searchtext">' . $search->getTitle() . "</div>";
        }
        $html .= "</div>";
        return $html;
    }

};