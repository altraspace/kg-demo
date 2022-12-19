
const formErrorMsg = (fieldName,msg,type='danger',fieldType='textarea') => {
    
    let alert = '<div class="invalid-feedback">'+msg+'</div>';
    let field = $('input[name="'+fieldName+'"]');

    // if(fieldType == 'input')
    // {
    //     let field = $('input[name="'+fieldName+'"]');
    // }else{
    //     if(fieldType == 'select')
    //     {
    //         let field = $('select[name="'+fieldName+'"]');
    //     }else{
    //         if(fieldType == 'textarea')
    //         {console.log('in textarea');
    //             let field = $('textarea[name="'+fieldName+'"]');
    //         }
    //     }
    // }
    field.addClass('is-invalid');
    field.siblings('div.invalid-feedback').remove();
    field.after(alert);
    setTimeout(function(){
        field.removeClass('is-invalid').siblings('div.invalid-feedback').fadeOut();
    }, 5000);
}

const formSelectErrorMsg = (fieldName,msg,type='danger') => {
    let alert = '<div class="invalid-feedback">'+msg+'</div>';
    let field = $('select[name="'+fieldName+'"]');
    field.addClass('is-invalid');
    field.siblings('div.invalid-feedback').remove();
    field.after(alert);
    setTimeout(function(){
        field.removeClass('is-invalid').siblings('div.invalid-feedback').fadeOut();
    }, 5000);
}

const formTextAreaErrorMsg = (fieldName,msg,type='danger') => {
    let alert = '<div class="invalid-feedback">'+msg+'</div>';
    let field = $('textarea[name="'+fieldName+'"]');
    field.addClass('is-invalid');
    field.siblings('div.invalid-feedback').remove();
    field.after(alert);
    setTimeout(function(){
        field.removeClass('is-invalid').siblings('div.invalid-feedback').fadeOut();
    }, 5000);
}
