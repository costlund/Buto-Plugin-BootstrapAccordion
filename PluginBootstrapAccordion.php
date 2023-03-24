<?php
class PluginBootstrapAccordion{
  public function widget_accordion($data){
    $data = new PluginWfArray($data);
    /**
     * id
     */
    if(!$data->get('data/id')){
      $data->set('data/id', 'id_'.wfCrypt::getUid());
    }
    /**
     * 
     */
    foreach($data->get('data/item') as $k => $v){
      $i = new PluginWfArray($v);
      /**
       * id
       */
      $data->set('data/item/'.$k.'/_id', '#'.$data->get('data/id'));

      if($data->get('data/always_open')){
        $data->set('data/item/'.$k.'/_id', '#zzz');
      }
      /**
       * id, item
       */
      $data->set('data/item/'.$k.'/id_collapse', 'collapse'.$k.'_'.$data->get('data/id'));
      $data->set('data/item/'.$k.'/_id_collapse', '#collapse'.$k.'_'.$data->get('data/id'));
      $data->set('data/item/'.$k.'/id_heading', 'heading'.$k.'_'.$data->get('data/id'));
      /**
       * class
       */
      $data->set('data/item/'.$k.'/button_class', 'accordion-button collapsed');
      $data->set('data/item/'.$k.'/collapse_class', 'accordion-collapse collapse');
      if($i->get('show')){
        $data->set('data/item/'.$k.'/button_class', 'accordion-button');
        $data->set('data/item/'.$k.'/collapse_class', 'accordion-collapse collapse show');
      }
    }
    /**
     * items
     */
    $items = array();
    foreach($data->get('data/item') as $k => $v){
      $element_item = wfDocument::getElementFromFolder(__DIR__, __FUNCTION__.'_item');
      $element_item->setByTag($v);
      $items[] = $element_item->get();
    }
    /**
     * element
     */
    $element = wfDocument::getElementFromFolder(__DIR__, __FUNCTION__);
    $element->setByTag(array('items' => $items));
    $element->setByTag($data->get('data'), 'data');
    wfDocument::renderElement($element);
  }
}
