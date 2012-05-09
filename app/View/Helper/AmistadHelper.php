<?
// This file is part of Questionity - http://www.questionity.com/
// 
/**
 * Questionity helpers.
 *                        
 *
 * @package    frontend
 * @subpackage app.views.helpers.questionity
 * @copyright  2011 Questionity
 */
 
 /**
  * Questionity helper class
  *
  */
class AmistadHelper extends AppHelper {

  var $helpers = array('Html', 'Session'); 

     /**
      * videos function create video form url (youtube and vimeo)).
      *
      * @param string $url
      * @param string $title
      * @param sring $width
      * @param string $height
      * @return string
      */
     function videos($url, $title, $width = 300 ,$height = 200){
        $urlinfo  = $this->parse_urlv($url);
        $video =''; 
        if (!empty($urlinfo) && isset($urlinfo['host'])){
           $host = $urlinfo['host'];
           
           if (($host == 'www.youtube.com') ||
               ($host == 'youtube.com') || 
               ($host == 'youtu.be')) {
              //youtube
                 if( stripos($url , 'v=') != false ){
                      $v = explode("v=",$url);
                      if( stripos($v[1] , '&') === false ){
                         $v[0] =  $v[1];
                      }else{
                        $v = explode("&",$v[1]);
                      }
                      
                  }else{
                    $v = explode("be/",$url); 
                    $v[0] = $v[1];
                  }
/* 20110929 f2r-bug#220*/ 
                  $video = ' <div>
                   <iframe title="'.$title.'" width="'.$width.'" height="'.($height+30).'" src="http://www.youtube.com/embed/'.$v[0].'?wmode=transparent" frameborder="0" allowfullscreen></iframe>
                   </div> ';

           } else if (($host == 'www.vimeo.com') ||
               ($host == 'vimeo.com')) {
               //vimeo
               $v = explode(".com/",$url); 
               $url = $v[1];
              $video = '<iframe src="http://player.vimeo.com/video/'.$url.'?title=0" width="'.$width.'" height="'.($height + 20).'" frameborder="0"></iframe>';
              
           }
        }
     return $video;
         
     }
     
     function iconvideo($url){
         $urlinfo  = $this->parse_urlv($url);
         $host = $urlinfo['host'];
         $img = '';
                     
            if (($host == 'www.youtube.com') || ($host == 'youtube.com') || ($host == 'youtu.be')) {
                 $img = 'iconyoutube.png';
                    
            } else if (($host == 'www.vimeo.com') || ($host == 'vimeo.com')) {
                  $img = 'iconvimeo.png';
               
            }
            return $img;
     }
     
     function fechaG($fecha){
         ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
         $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
         return $lafecha;
     } 
     // fechas con /
     function fechaB($fecha){
         ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
         $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
         return $lafecha;
     }

     function fechaM($fecha){
     	$mes = array( __("Jan", true), __("Feb", true), __("Mar", true),
                    __("Apr", true), __("May", true), __("Jun", true),
                    __("Jul", true), __("Aug", true), __("Sep", true), 
                    __("Oct", true), __("Nov", true), __("Dec", true) );
     	ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
     	$mifecha[2]=(string)(int)$mifecha[2] - 1;
         $lafecha=$mifecha[3]." ".$mes[$mifecha[2]]." ".$mifecha[1];
         return $lafecha;
     }
     function hora($hora){
     	$hora=substr($hora, 0, 5);
     	$hora = $hora.' h';
     	 return $hora;
     }
     
   function date_diff($start, $end = "NOW", $text = null) {
      $sdate = strtotime($start);
      $edate = strtotime($end);
     
      $time = $edate - $sdate;

      if ($time <= 0) {
         $text = __("just now") ;
      } else if ($time < MINUTE ) {
         if ($time == 1) $text = $time . ' ' . __("second", true) . ' ';
         else            $text = $time . ' ' . __("seconds", true) . ' ';
      } else if ($time < HOUR) {
         $time = floor($time / MINUTE);
         if ($time == 1) $text = $time . ' ' . __("minute", true) . ' ';
         else            $text = $time . ' ' . __("minutes", true) . ' ';
      } else if ($time < DAY) {
         $time = floor($time / HOUR);
         if ($time == 1) $text = $time . ' ' . __("hour", true) . ' ';
         else            $text = $time . ' ' . __("hours", true) . ' ';
      } else if ($time < WEEK) {
         $time = floor($time / DAY);
         if ($time == 1) $text = $time . ' ' . __("day", true) . ' ';
         else            $text = $time . ' ' . __("days", true) . ' ';
      } else {
         $text = $this->fechaM($start);
      }
      
      return $text;
/*      
      if ( ($time >= 0) && ($time <= 59) ) {
         // Seconds
         $timeshift = $time;
         if ($time == 1) $timeshift .= ' ' . __("second", true) . ' ';
         else            $timeshift .= ' ' . __("seconds", true) . ' ';

      } else if ( ($time >= 60) && ($time <= 3599) ) {
         // Minutes + Seconds
         $pmin = ($edate - $sdate) / 60;
         $premin = explode('.', $pmin);
        
         $presec = $pmin - $premin[0];
         $sec = $presec * 60;
        
         //$timeshift = $premin[0].' min '.round($sec,0).' sec ';
         $timeshift = $premin[0];
         if ($premin[0] == 1) $timeshift .= ' ' . __("minute", true) . ' ';
         else                 $timeshift .= ' ' . __("minutes", true) . ' ';

      } else if ( ($time >= 3600) && ($time <= 86399) ) {
         // Hours + Minutes
         $phour = ($edate - $sdate) / 3600;
         $prehour = explode('.', $phour);

         $premin = $phour - $prehour[0];
         $min = explode('.', $premin * 60);

         @$presec = '0.' . $min[1];
         $sec = $presec * 60;

         //$timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
         $timeshift = $prehour[0];
         if ($prehour[0] == 1) $timeshift .= ' ' . __("hour", true) . ' ';
         else                  $timeshift .= ' ' . __("hours", true) . ' ';
     
      } else if ( ($time >= 86400) && ($time <= 604799) ) {
         // Days + Hours + Minutes
         $pday = ($edate - $sdate) / 86400;
         $preday = explode('.', $pday);

         $phour = $pday - $preday[0];
         $prehour = explode('.', $phour * 24);

         $premin = ($phour * 24) - $prehour[0];
         $min = explode('.', $premin * 60);
        
         $presec = '0.' . $min[1];
         $sec = $presec * 60;
                    
         //$timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
         $timeshift = $preday[0];
         if ($preday[0] == 1) $timeshift .= ' ' . __("day", true) . ' ';
         else                 $timeshift .= ' ' . __("days", true) . ' ';
     
      } else if ($time >= 604800){
         $text = null;
         $timeshift = $this->fechaM($start);
      }
            
      return $timeshift.' '.$text;
*/
   }
     
     function opinion($qstrm){
        $return = '';
        $img = '';
        if(isset($qstrm->content->qstn->text)){
           $total = $qstrm->nyeah+$qstrm->nnoway;
           if($qstrm->nyeah > $qstrm->nnoway){
              $img = '<img src="'.$this->Html->url("/").'img/icon/16/yeah.png"> ('.$qstrm->nyeah.' '.__('YEAH',true).')';
           }elseif($qstrm->nnoway > $qstrm->nyeah){
              $img = '<img src="'.$this->Html->url("/").'img/icon/16/noway.png"> ('.$qstrm->nnoway.' '.__('NOWAY',true).')';
           }
        }else{
          $total = $qstrm->nforward; 
          $img = '<img src="'.$this->Html->url("/").'img/icon/16/fwd.png"> ('.$qstrm->nforward.' '.__('FWD',true).')';
           
        }
        
        return $total.' '.$img;
     }
  private function parse_urlv($url) {
     $urlinfo = @parse_url($url);
     $urlinfo['url'] = $url;
     if (isset($urlinfo['query'])) {
        $vars = explode('&', $urlinfo['query']);
        $variables = array();
        foreach ($vars as $var) {
           $var = explode('=',$var);
           $variables[$var[0]] = $var[1];
        }
        $urlinfo['variables'] = $variables;
     }
     
     return $urlinfo;
  }
  
   function link($link, $title = '', $target = '_blank') {
      if (empty($title)) $title = $link;

      $htmltarget = '';
      if (!empty($target)) $htmltarget = 'target="' . $target . '"';

      $prefix = 'http://';
      if (strrpos($link, "http://") === 0) {
         $prefix = '';
      } else if (strrpos($link, "https://") === 0) {
         $prefix = '';
      }

      $link = $prefix . $link;
            
      $html = '<a ' . $htmltarget . ' href="' . $link . '">' . $title . '</a>';
      return $html;
   }

   function question_show($qstrm) {
      $q = $qstrm->content->question;
      $text = '<h3><span class="question_text">' . $q->text. '</span></h3>';
      return $text;
   }

   function recommend_show($qstrm, $onlyqstn = false) {
      if(!isset($qstrm->content->recommend)){
         $r = $qstrm->content->question;
      }else{
         $r = $qstrm->content->recommend;
      }
      
      $text = '<h3><span class="question_text c_to_gram">' . $r->text. '</span></h3>';
      $p = null;
      $v = null;
      if (!$onlyqstn) {
         foreach ($qstrm->content->qmms as $qmm) {
            if ($qmm->qmmtype == QAPI_QMMTYPE_PICTURE) {
               $p = $qmm;
            } else if ($qmm->qmmtype == QAPI_QMMTYPE_VIDEO) {
               $v = $qmm;
            }
         }
      }
      $text .= '<h4>';
      switch (@$r->type) {
         case RECOMMEND_PICTURE:
            $text .= '<br>';
            if (!empty($p)) {
               $text .= $this->link($r->url, '<img src="' . $p->thumb_mini . '" alt="' . $p->title . '" />');
            } else {
               $text .= $this->link($r->url);
            }
            
            break;
         case RECOMMEND_VIDEO:
            $text .= '<br>';
            if (!empty($v)) {
               $text .= $this->link($r->url, '<img src="' . $v->thumb_mini . '" alt="' . $v->title . '" />');
            } else {
               $text .= $this->link($r->url);
            }
            
            break;
         case RECOMMEND_WEBSITE:
         
            $text .= $this->link($r->url);
           
            break;
         case RECOMMEND_TV:
            $text .=  $r->title;
            break;
         case RECOMMEND_MOVIE:
           
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->director)) $text .= $r->director . '<br/>';
         
            break;
         case RECOMMEND_GAME:
           
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->creator))  $text .= $r->creator . '<br/>';
           
            break;
         case RECOMMEND_BOOK:
         
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->author))   $text .= $r->author . '<br/>';
           
            break;
         case RECOMMEND_MUSIC:
           
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->author))   $text .= $r->author . '<br/>';
            if (!empty($r->company))  $text .= $r->company . '<br/>';
           
            break;
         case RECOMMEND_PLACE:
           
            if (!empty($r->placetype))  $text .= $r->placetype . '<br/>';
            if (!empty($r->name))       $text .= $r->name . '<br/>';
            if (!empty($r->city)) {
               $text .= $r->city;
               if (!empty($r->country)) $text .= ' (' . $r->country . ')<br/>';
               else $text .= '<br/>';
            } else {
               if (!empty($r->country)) $text .= $r->country . '<br/>';
            }
            if (!empty($r->address))  $text .= $r->address . '<br/>';
            
            break;
         case RECOMMEND_BUSINESS:
           
            if (!empty($r->description)) $text .= $r->description . '<br/>';
            if (!empty($r->company))     $text .= $r->company . '<br/>';
            if (!empty($r->country))     $text .= $r->country . '<br/>';
            
            break;
      }
      $text .= '</h4>';
      return $text;
   }
   function recommend_show_title($qstrm, $onlyqstn = false) {
      if(!isset($qstrm->content->recommend)){
         $r = $qstrm->content->question;
      }else{
         $r = $qstrm->content->recommend;
      }
      
      $text = '<h3><span class="question_text c_t_gram">' . $r->text. '</span></h3>';
      
      return $text;
   }
   function recommend_show_text($qstrm, $onlyqstn = false) {
      if(!isset($qstrm->content->recommend)){
         $r = $qstrm->content->question;
      }else{
         $r = $qstrm->content->recommend;
      }
      
      $text = '';
      $p = null;
      $v = null;
      if (!$onlyqstn) {
         foreach ($qstrm->content->qmms as $qmm) {
            if ($qmm->qmmtype == QAPI_QMMTYPE_PICTURE) {
               $p = $qmm;
            } else if ($qmm->qmmtype == QAPI_QMMTYPE_VIDEO) {
               $v = $qmm;
            }
         }
      }
      $text .= '<h4 class="c_to_gram">';
      switch (@$r->type) { 
         case RECOMMEND_PICTURE:
           
            if (!empty($p)) {
               //$text .= $this->link($r->url, '<img src="' . $p->thumb_mini . '" alt="' . $p->title . '" />');
               $text .= $this->link($r->url, substr( $r->url, 0, 50 ).'...');
            } else {
               $text .= $this->link($r->url);
            }
            
            break;
         case RECOMMEND_VIDEO:
            $text .= '<h4>';
            if (!empty($v)) {
               //$text .= $this->link($r->url, '<img src="' . $v->thumb_mini . '" alt="' . $v->title . '" />');
               $text .= $this->link($r->url, substr( $r->url, 0, 50 ).'...');
            } else {
               $text .= $this->link($r->url);
            }
            
            break;
         case RECOMMEND_WEBSITE:
            
            $text .= $this->link($r->url);
            
            break;
         case RECOMMEND_TV:
            $text .= '<h4>' . $r->title . '</h4>';
            break;
         case RECOMMEND_MOVIE:
            
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->director)) $text .= $r->director . '<br/>';
            
            break;
         case RECOMMEND_GAME:
            
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->creator))  $text .= $r->creator . '<br/>';
            
            break;
         case RECOMMEND_BOOK:
            
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->author))   $text .= $r->author . '<br/>';
            
            break;
         case RECOMMEND_MUSIC:
            
            if (!empty($r->title))    $text .= $r->title . '<br/>';
            if (!empty($r->author))   $text .= $r->author . '<br/>';
            if (!empty($r->company))  $text .= $r->company . '<br/>';
            
            break;
         case RECOMMEND_PLACE:
            
            if (!empty($r->placetype))  $text .= $r->placetype . '<br/>';
            if (!empty($r->name))       $text .= $r->name . '<br/>';
            if (!empty($r->city)) {
               $text .= $r->city;
               if (!empty($r->country)) $text .= ' (' . $r->country . ')<br/>';
               else $text .= '<br/>';
            } else {
               if (!empty($r->country)) $text .= $r->country . '<br/>';
            }
            if (!empty($r->address))  $text .= $r->address . '<br/>';
            
            break;
         case RECOMMEND_BUSINESS:
            
            if (!empty($r->description)) $text .= $r->description . '<br/>';
            if (!empty($r->company))     $text .= $r->company . '<br/>';
            if (!empty($r->country))     $text .= $r->country . '<br/>';
            
            break;
      }
      $text .= '</h4>';
      return $text;
   }

   function country_by_code($code, $countries) {
      $country = __("World", true);
      if (!empty($countries)) {
         foreach ($countries as $co) {
            if ($co->code === $code) {
               $country = $co->name;
            } 
         }
      }
      return $country;
   }

   function language_by_code($code, $languages) {
      $language = __("All Languages", true);
      if (!empty($languages)) {
         foreach ($languages as $lang) {
            if ($lang->code === $code) {
               $language = $lang->name;
            } 
         }
      }
      return $language;
   }

   function text_crop($text, $length) {
      $croptext = $text;
      if (strlen($croptext) > $length) {
         $croptext = substr($croptext, 0, $length - 3);
         $croptext .= "...";
      }
      
      return $croptext;
   }
   function num_crop($num){
      if($num <= 999){
         return $num;
      }elseif($num > 999 && $num < 999999){
         $num = floor($num/1000);
         $return = substr($num, 0, 3).'K';
         return $return;
      }elseif($num > 999999){
         $num = floor($num/1000000);
         $return = substr($num, 0, 3).'M';
         return $return; 
      }
   }
}

