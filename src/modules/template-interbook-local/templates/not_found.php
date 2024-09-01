<?
    $render_not_found = function(Module $template, Syslet $syslet, ?array $target_ids, $placeholders_overrides = []) {

        ///////////////////////////////////////////////
        // Prepare sub-template `template-navigable` //
        ///////////////////////////////////////////////
        
        $placeholders_for_subtemplate_default = [
            'url'     => $template->get_url(),
            'css_url' => $template->get_css_url(),
        ];
        $placeholders_for_subtemplate = array_merge($placeholders_for_subtemplate_default, $placeholders_overrides);
        $sub_template = $target->activated_modules['template-interbook'];
        

        ////////////
        // Render //
        ////////////

        // Render using sub-template
        $sub_template->render_not_found($target, $target_ids, $placeholders_for_subtemplate);
    };
?>