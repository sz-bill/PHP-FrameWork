<?php
class test{
    protected $array = array(23,5,26,4,9,85,10,2,55,44,21,39,11,16,55,88,421,226,588);
    
    private function wlog($message = ''){
        if($message != ''){
            @file_put_contents(date('Ymd').'.log', date('Y-m-d H:i:s')."\t## ".var_export($message, true)."\r\n", FILE_APPEND);
        }
    }
    /**
    * 交换 a, b两个值
    * 
    * @param mixed $a
    * @param mixed $b
    * @param mixed $is
    */
    public function exchange($a, $b, $is = false){
        $dd[] = array($a, $b);
        if($is == false){
            $a = $a + $b;
            $b = $a - $b;
            $a = $a - $b;
        }
        if($is == true){
            $b = $a + $b;
            $a = $b - $a;
            $b = $b - $a;
        }
        
        $dd[] = array($a, $b);
        $this->wlog($dd);
    }
    /**
    * 常见的冒泡写法 -- 就是把大的数字往移 -- 相邻位置的两个数字值进行交换
    * 思路分析：法如其名，就是像冒泡一样，每次从数组当中 冒一个最大的数出来。 
    * 比如：2,4,1    // 第一次 冒出的泡是4 
    *       2,1,4   // 第二次 冒出的泡是 2 
    *       1,2,4   // 最后就变成这样 
    * @param mixed $srcArray
    */
    public function p1($srcArray = array()){
        $array = (count($srcArray) > 0) ? $srcArray : $this->array;
        $this->wlog(implode(', ', $array));
        $n = count($array);
        for($h = 0; $h < $n-1; $h++){
            for($i = 0; $i < $n-$h-1; $i++){
                $a = $array[$i];
                $b = $array[$i+1];
                if($a > $b){
                    $a = $a + $b;
                    $b = $a - $b;
                    $a = $a - $b;
                    $array[$i] = $a;
                    $array[$i+1] = $b;
                }
            }
            $this->wlog(implode(', ', $array));
        }
        $this->wlog(implode(', ', $array));
    }
    /**
    * 选择排序法  把最小值往移， 从两个不相邻的数字交换
    * 实现思路 双重循环完成，外层控制轮数，当前的最小值。内层 控制的比较次数
    * 
    * @param mixed $arr
    */
    public function p2($arr = Array()) {
        $arr = (count($arr) > 0) ? $arr : $this->array;
        $this->wlog(implode(', ', $arr));
        
        //$i 当前最小值的位置， 需要参与比较的元素
        for($i=0, $len=count($arr); $i<$len-1; $i++) {
            //先假设最小的值的位置
            $p = $i;
            //$j 当前都需要和哪些元素比较，$i 后边的。
            for($j=$i+1; $j<$len; $j++) {
                //$arr[$p] 是 当前已知的最小值
                if($arr[$p] > $arr[$j]) {
                    //比较，发现更小的,记录下最小值的位置；并且在下次比较时，
                    // 应该采用已知的最小值进行比较。
                    $p = $j;
                }
            }
            //已经确定了当前的最小值的位置，保存到$p中。
            //如果发现 最小值的位置与当前假设的位置$i不同，则位置互换即可
            
            #方法一,  把两个位置的值交换后， 重置用新值放入原来位置 -- 不推荐使用
            /*
            $a = $arr[$p];
            $b = $arr[$i];
            if($a != $b){
                $a = $a + $b;
                $b = $a - $b;
                $a = $a - $b;
                
                $arr[$p] = $a;
                $arr[$i] = $b;
            }
            */
            
            #方法二，说明[new = x; x=y; y=new],  临时值存放左路一个值， 把另一个值放当前位置中， 再把临时值放入另一个位置中。
            if($p != $i) {
                $tmp = $arr[$p];
                $arr[$p] = $arr[$i];
                $arr[$i] = $tmp;
            }
            
            $this->wlog(implode(', ', $arr));
        }
        $this->wlog(implode(', ', $arr));
    }
    /**
    * 插入排序法思路：
    * 将要排序的元素插入到已经 假定排序号的数组的指定位置。
    * 
    * @param mixed $arr
    */
    public function p3($arr = array()) {
        $arr = (count($arr) > 0) ? $arr : $this->array;
        $this->wlog(implode(', ', $arr));
        
        //区分 哪部分是已经排序好的
        //哪部分是没有排序的
        //找到其中一个需要排序的元素
        //这个元素 就是从第二个元素开始，到最后一个元素都是这个需要排序的元素
        //利用循环就可以标志出来
        //i循环控制 每次需要插入的元素，一旦需要插入的元素控制好了，
        //间接已经将数组分成了2部分，下标小于当前的（左边的），是排序好的序列
        for($i=1, $len=count($arr); $i<$len; $i++) {
            //获得当前需要比较的元素值。
            $tmp = $arr[$i];
            //内层循环控制 比较 并 插入
            for($j=$i-1;$j>=0;$j--) {
                //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
                if($tmp < $arr[$j]) {
                    //发现插入的元素要小，交换位置
                    //将后边的元素与前面的元素互换
                    $arr[$j+1] = $arr[$j];
                    //将前面的数设置为 当前需要交换的数
                    $arr[$j] = $tmp;
                } else {
                    //如果碰到不需要移动的元素
               //由于是已经排序好是数组，则前面的就不需要再次比较了。
                    break;
                }
            }
            $this->wlog(implode(', ', $arr));
        }
        $this->wlog(implode(', ', $arr));
    }
    /**
    * 快速排序法
    * 
    * @param mixed $arr
    */
    public function p4($arr = array()) {
        $arr = (count($arr) > 0) ? $arr : $this->array;
        $this->wlog(implode(', ', $arr));
        
        //先判断是否需要继续进行
        $length = count($arr);
        if($length <= 1) {
            return $arr;
        }
        //如果没有返回，说明数组内的元素个数 多余1个，需要排序
        //选择一个标尺
        //选择第一个元素
        $base_num = $arr[0];
        //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
        //初始化两个数组
        $left_array = array();//小于标尺的
        $right_array = array();//大于标尺的
        for($i=1; $i<$length; $i++) {
            if($base_num > $arr[$i]) {
                //放入左边数组
                $left_array[] = $arr[$i];
            } else {
                //放入右边
                $right_array[] = $arr[$i];
            }
        }
        //再分别对 左边 和 右边的数组进行相同的排序处理方式
        //递归调用这个函数,并记录结果
        $this->wlog('----------------------------------------------');
        $this->wlog(implode(', ', $left_array));
        $this->wlog(implode(', ', $right_array));
        
        $left_array = $this->p4($left_array);
        $right_array = $this->p4($right_array);
        
        //合并左边 标尺 右边
        $final = array_merge($left_array, array($base_num), $right_array);
        $this->wlog(implode(', ', $final));
        return $final;
    }
}

$t = new test();
$t->p1();
#$t->p2();
#$t->p3();
#$t->p4();
#$t->exchange(20, 30, true);