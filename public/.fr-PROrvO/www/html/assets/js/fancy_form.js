(function($)
{
    $.fancy_form = function (title, html_form, validate_callback){

        this.title = title;
        this.validate_callback = validate_callback;
        this.form_id = 'fancy_form';
        this.form;
        var myself = this;

        this.open = function (){
            
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
            $('#'+this.form_id).bind('submit', {form:myself}, this.validate_callback); 

        }
        
        this.val = function(key, val)
        {
            if(val)
                return this.form.find('#'+key).val(val);
            else
                return this.form.find('#'+key).val();
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



    

