<?php
/*
Question List Details Plugin
*/

class qa_html_theme_layer extends qa_html_theme_base
{   
    
public function q_item_content($q_item) {
    $postid = $q_item['raw']['postid'];
    $content = qa_db_read_one_value(qa_db_query_sub('SELECT content FROM ^posts WHERE postid IN (#)', $postid), true);
    if (!empty($content)) {
        if (strlen(strip_tags($content)) > 200) {
            $shortcontent = substr(strip_tags($content), 0, 200).'[...]';
        }
        else {
            $shortcontent = strip_tags($content);
        }
        preg_match_all('/<iframe[^>]+src="([^"]+)"/', $content, $vmatches);
        preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $content, $matches);
        $this->output('<div class="qa-q-item-content">');
        $this->output($shortcontent);
        if (!empty($vmatches[0])) {
            $this->output('<br/>');
            $this->output('<div style="position: relative;padding-bottom: 56.25%;padding-top: 35px;height: 0;overflow: hidden;"><iframe style="position: absolute;top:0;left: 0;width: 100%;height: 100%;" src="' . $vmatches[1][0] . '" width=560 height=315 allowfullscreen="" frameborder="0"></iframe></div>');
        }
        elseif(!empty($matches[0])) {
            $this->output('<br/>');
            $this->output('<a href="/'.$postid.'" rel="nofollow"><img src="' . $matches[1][0] . '" alt=".$q_item['raw']['title']."></a>');
        }
        $this->output('</div>');
    }
}
	
}	
