<?php


            $tab_sql = "SELECT * FROM questions WHERE exam_id = '$eid'";
             $resultset = mysqli_query($conn, $tab_sql) or die("database error:". mysqli_error($conn));
             $active_class = 0;
             $tab_html = '';
             $question_html = '';
             $qno=1;
             $content_class="";
             $tab_class="";
             $totalq=mysqli_num_rows($resultset);
             while( $ques = mysqli_fetch_assoc($resultset) )
             {
                $tab_html.="<li><a data-toggle='tab' role='tab' href='#".$qno."' id='tb".$qno."' onclick='qnoval(".$qno.")'>".$qno."</a></li>&emsp;";
                if($qno==1)
                {
                    $content_class="tab-pane fade show active";
                }
                else
                {
                    $content_class="tab-pane fade";   
                }

                
                 $question_html .= '<div id="'.$qno.'" class="'.$content_class.'" align="left">';
                 $question_html .= '<br><h5>'.$qno.') '.nl2br($ques["question"]).'</h5><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="op1" id="a'.$qno.'">&nbsp;<label for="a'.$qno.'">'.nl2br($ques["op1"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="op2" id="b'.$qno.'">&nbsp;<label for="b'.$qno.'">'.nl2br($ques["op2"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="op3" id="c'.$qno.'">&nbsp;<label for="c'.$qno.'">'.nl2br($ques["op3"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="op4" id="d'.$qno.'">&nbsp;<label for="d'.$qno.'">'.nl2br($ques["op4"]).'</label><br>';
                 $question_html .= '<input type="hidden" value="'.$ques['question_id'].'" name="q'.$qno.'">';
                 $question_html .= '<input type="hidden" value="'.$ques['ans'].'" name="a'.$qno.'">';
                 $question_html .= '<input type="hidden" value="'.$totalq.'" name="totalq">';
              

                 if($qno==$totalq)
                 {
                  $question_html .='<br><input type="submit" name="submit_ans" value="submit" id="fintest"><br>';
                 }
                 else
                 {
                 $question_html.='<br><button onclick="nextq();return false;">&#10132;</button><br>';
                 }
                 $question_html .= '<div class="clear_both"></div></div>';
                 
                $qno++;
             }
          


            ?>

<script type="text/javascript">
    
    var qno=1
    function nextq()
    {
     qno=qno+1;
     id="#tb"+qno;
     console.log(id);
     $(id).click();   
    }

    function qnoval(val)
    {
     qno=val;
    }
</script>
