<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
    <div class="content">
                 <div  id="rinci">    
                            <?php 
                            $keluh = str_replace("_"," ",$_GET['param']);
                            $rinci = Lookup::items2($keluh,'rincian_karakter');
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                           $form->field($model, 'keluhan_rincian')->radioList($rinci);
                         /*   $form->field($model, 'keluhan_rincian')->radioList($rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . ucwords($label) . '" data-value="'.ucwords($label).'" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]);*/ ?>
                 </div>       
            </div>

