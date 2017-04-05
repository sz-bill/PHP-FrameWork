<?php

namespace App\Http\Controllers\Admin;

use App\models\Banner;
use App\models\BlockHome;
use App\models\Blocks;
use App\models\Common;
use App\models\ManageHome;
use App\models\Upload;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use think\Exception;

class ManageHomeController extends Controller
{
    public function __construct()
    {
        //        后台的每个控制器都必须加这一行才会验证登录
        $this->middleware('admin');
    }
    protected function getBanner(){
        return new Banner();
    }
    protected function getManageHome(){
        return new ManageHome();
    }
    protected function getUpload(){
        return new Upload();
    }
    protected function getCommon(){
        return new Common();
    }
    protected function getBlocks(){
        return new Blocks();
    }
    protected function getBlockHome(){
        return new BlockHome();
    }
    public function index(){
        $collection = $this->getBlockHome()->orderBy('id')->get();
        $status = $this->getCommon()->getStatus();
        $type = $this->getCommon()->getRowColumn();
        $visibility = $this->getCommon()->getVisibility();
//        print_r($collection->toArray());die;
        $data = ['status' => $status, 'type' => $type,'visibility' => $visibility, 'collection' => $collection];
        return view('admin.home.index', $data);
    }
    /**
     * 添加内容
     */
    public function add(Request $request){
        if ($request->isMethod('post')) {
            $form = $request->input();
            unset($form['_token']);
            $rowData = $form;
            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");

            $content2 = $rowData['content2'];
            $content3 = $rowData['content3'];
            $content4 = $rowData['content4'];
            unset($rowData['content2']);
            unset($rowData['content3']);
            unset($rowData['content4']);

            $blocks_id = [];
            if($rowData['type'] == Common::ROW1_COLUMN1){
                try{
                    $rowID1 = $this->getBlocks()->insert($rowData);
                    $rowID1 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    array_push($blocks_id, $rowID1);
                }catch (Exception $e){
                    return redirect()->back()->with('message', '保存失败');
                }
            }


            if($rowData['type'] == Common::ROW1_COLUMN2){
                try{
                    $rowID1 = $this->getBlocks()->insert($rowData);
                    $rowID1 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content2;
                    $rowID2 = $this->getBlocks()->insert($rowData);
                    $rowID2 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    array_push($blocks_id, $rowID1);
                    array_push($blocks_id, $rowID2);
                }catch (Exception $e){
                    return redirect()->back()->with('message', '保存失败');
                }
            }
            if($rowData['type'] == Common::ROW1_COLUMN3){
                try{
                    $rowID1 = $this->getBlocks()->insert($rowData);
                    $rowID1 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content2;
                    $rowID2 = $this->getBlocks()->insert($rowData);
                    $rowID2 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content3;
                    $rowID3 = $this->getBlocks()->insert($rowData);
                    $rowID3 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    array_push($blocks_id, $rowID1);
                    array_push($blocks_id, $rowID2);
                    array_push($blocks_id, $rowID3);
                }catch (Exception $e){
                    return redirect()->back()->with('message', '保存失败');
                }
            }
            if($rowData['type'] == Common::ROW1_COLUMN4){
                try{
                    $rowID1 = $this->getBlocks()->insert($rowData);
                    $rowID1 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content2;
                    $rowID2 = $this->getBlocks()->insert($rowData);
                    $rowID2 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content3;
                    $rowID3 = $this->getBlocks()->insert($rowData);
                    $rowID3 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    $rowData['content'] = $content4;
                    $rowID4 = $this->getBlocks()->insert($rowData);
                    $rowID4 = $this->getBlocks()->orderBy('id','desc')->get()->first()->id;
                    array_push($blocks_id, $rowID1);
                    array_push($blocks_id, $rowID2);
                    array_push($blocks_id, $rowID3);
                    array_push($blocks_id, $rowID4);
                }catch (Exception $e){
                    return redirect()->back()->with('message', '保存失败');
                }
            }

            $blockHome = [
                'status' => $rowData['status'],
                'type' => $rowData['type'],
                'created_at' => $rowData['created_at'],
                'updated_at' => $rowData['updated_at'],
                'blocks_id' => implode(',', $blocks_id),
                'sort' => 0,
            ];
            try{
                $inserID = $this->getBlockHome()->insert($blockHome);
            }catch (Exception $e){}

            return redirect('admin/ManageHome');
        }

        $pageCode = Common::NAV_HOME;
        $status = $this->getCommon()->getStatus();
        $type = $this->getCommon()->getRowColumn();
        $visibility = $this->getCommon()->getVisibility();
        $ckeditors = [
            'content' => Common::ckeditor('content'),
            'content2' => Common::ckeditor('content2'),
            'content3' => Common::ckeditor('content3'),
            'content4' => Common::ckeditor('content4')
        ];
        $data = [
            'page_code' => $pageCode,
            'status' => $status,
            'visibility' => $visibility,
            'type' => $type,
            'ckeditor' => $ckeditors,
        ];
//        print_r($data);die;
        return view('admin.home.add', $data);
    }

}
