const workshop_pages = {};

workshop_pages.Console = (title, values, oneValue = true) => {
    console.log('---' + title + '---');
    if(oneValue){
        console.log(values);
    }else{
        for(let i =0; i< values.length; i++){
            console.log(values[i]);
        }
    }
    console.log('--/' + title + '---');
}

workshop_pages.loadFor = (page) => {
    eval("workshop_pages.load_" + page + "();");
}

workshop_pages.load_landing = () => {
    workshop_pages.landing = {};

    workshop_pages.landing.mergeSort = () => {

    };


    alert("HI FROM JS");
}

workshop_pages.load_profile = () => {
    alert("HI FROM PROFILE PAGE");
}