(function($)
{
    $.fancy_form = function (title, template_id, validate_callback, template_vars){

        this.title = title;
        this.template = $('#'+template_id);
        this.validate_callback = validate_callback;
        this.form_id = 'fancy_form';
        this.form;
        this.template_vars = template_vars;
        var myself = this;

        this.open = function (){
            
            var html_form = this.parse_template();
            $.fancybox(
                '<form id="'+this.form_id+'">'+html_form+'</form>',
                {
                    title: this.title
                }
            );
            this.form = $('#'+this.form_id);
            this.form.submit(function(){return false;});
            this.form.find('input').first().focus();
            
        } 



        this.add_listeners = function ()
        {
            this.form.keyup(this.handle_keys);
            $('.fancy_form_validate').click(this.validate);
            $('#'+this.form_id).bind('fancy_form_validate', this.validate_callback); 

        }

        this.handle_keys = function(event){
            if(event.which == 13)
            {
                myself.validate();
            }
        }

        this.validate = function()
        {
            $('#'+myself.form_id).trigger('fancy_form_validate', [myself]);
        }
        
        this.val = function(key, val)
        {
            if(val)
                return this.form.find('#'+key).val(val);
            else
                return this.form.find('#'+key).val();
        }
        
        this.parse_template = function()
        {
            var html = this.template.html();
            for(key in this.template_vars)
            {
                html = html.replace('{{'+key+'}}', this.template_vars[key]);
            }
            return html;
        }
        
        this.get_posted_data = function()
        {
            return this.form.serialize();
        }
        
        this.close = function()
        {           
            $.fancybox.close();
        }

        this.open();
        this.add_listeners();
        
        return this;

    }
})(jQuery);



    

