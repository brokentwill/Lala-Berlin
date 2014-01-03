<?php



class OnlineBiz_Custom_LayzyController extends Mage_Core_Controller_Front_Action {

    
    public function indexAction() {
        //echo 'Hell There!';
    }


    public function loadAction() {

        if ($_POST['ids'] || $_POST['mergeId']) {

            $html = '';
            if ($_POST['ids']) {
                $data = json_decode(stripslashes($_POST['ids']));
            }
        
            if ($_POST['mergeId']) {
                $data = explode(',', $_POST['mergeId']);
            }

            $collection = Mage::getModel('blog/blog')->getCollection()
                ->addPresentFilter()
                ->addFieldToFilter('main_table.post_id', array('nin'=>$data))
                ->addEnableFilter(AW_Blog_Model_Status::STATUS_ENABLED)
                ->addStoreFilter()
                ->setOrder('created_time', 'desc');
            $collection->setPageSize(Mage::getStoreConfig('blog/blog/perpage'));

            if (!count($collection)) {
                return false;
            } else {
                foreach ($collection as $post) {
                    $dt = explode(' ', $post->getCreatedTime());
                    $dumpId[] = $post->getPostId();
                    $dumpMedia = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . $post->getFeatureMedia();
                    
                    $dumpHtml = '<li class="postWrapper">
                                <div class="postTitle">
                                    <h3>' . $dt[0] . '</h3>
                                    <img src="' . $dumpMedia .'">
                                </div>
                                <div class="postContent">
                                    <h2><a href="' . $post->getAddress() . '">' . $post->getTitle() . '</a></h2>
                                    <div class="content">' . $post->getPostContent() . '</div>
                                </div>
                            </li>';


                    $html .= $dumpHtml;
                }

                $newId = array_merge($data,$dumpId);

                $result = array(
                    'newId' => $newId,
                    'html' => $html,
                );

                $this->getResponse()->setBody(json_encode($result));
            }
            
        }
    }


}
