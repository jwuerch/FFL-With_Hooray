<script id="bd_news_in_tabs_home2" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home2_box_{{= data}}">
            <input type="hidden" name="home2[{{= data}}][type]" value="news_in_tabs_box_home2" />
            <div class="boxes_title">
                <i class="handle fa fa-navicon"></i>
                <?php _e( 'No Name', LANG ) ?>
                <i class="del fa fa-remove" id="remove_{{= data}}"></i>

            </div>
            <div class="builder_content">
                <div class="bd_item_content of">
                    <div class="bd_option_item">
                        <h3><?php _e('Category',LANG) ?> </h3>
                        <select multiple="multiple" style="height: auto;" name="home2[{{= data}}][cat][]" id="bd_setting_home2_{{= data}}_cat">
                            {{= cats}}
                        </select>
                    </div>

                    <div class="bd_option_item">
                        <h3>Posts Order By</h3>
                        <select name="home2[{{= data}}][order]" id="bd_setting_home2_{{= data}}_order">
                            <option selected="selected" value="date">Latest Posts</option>
                            <option value="rand">Random Posts</option>
                            <option value="modified">Last Modified</option>
                            <option value="name">Post Name</option>
                        </select>
                    </div>

                    <div class="bd_option_item">
                        <h3><?php _e('Number of posts',LANG) ?> </h3>
                        <input class="input_numb" name="home2[{{= data}}][number]" type="text" value="5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>