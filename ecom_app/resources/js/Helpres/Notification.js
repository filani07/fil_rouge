class Notification{

        success(){
            new Noty({
                type:'success',
                layout:'topRight',
                text: 'Successfully Done!',
                timeout:1000
                
            }).show();
        }

        alert(){
            new Noty({
                type:'alert',
                layout:'topRight',
                text: 'Are You Sure?',
                timeout:1000
                
            }).show();
        }

        error(){
            new Noty({
                type:'warning',
                layout:'topRight',
                // text: 'Something Went Wrong ! ',
                text: 'Opps Wrong ! ',
                timeout:1000
                
            }).show();
        }
}

export default Notification = new Notification()