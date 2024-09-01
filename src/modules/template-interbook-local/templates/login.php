<?
    $render_login = function(Module $template, Syslet $syslet, bool $logout_successful, bool $password_incorrect, array $placeholders_overrides = []) {

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
        $sub_template->render_login($target, $logout_successful, $password_incorrect, $placeholders_for_subtemplate);
    };
?>