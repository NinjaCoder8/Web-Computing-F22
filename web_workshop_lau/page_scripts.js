const workshop_pages = {};

const base_url = "http://localhost/mobile/";

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

workshop_pages.getAPI = async (api_url) => {
    try{
        return await axios(api_url);
    }catch(error){
        workshop_pages.Console("Error from Linking (GET)", error);
    }
}

workshop_pages.postAPI = async (api_url, api_data, api_token = null) => {
        try{
            return await axios.post(
                api_url,
                api_data,
                {
                    headers:{
                        'Authorization' : "token " + api_token
                    }
                }
            );
        }catch(error){
            workshop_pages.Console("Error from Linking (POST)", error);
        }
}

workshop_pages.load_landing = async () => {
    const articles_url = base_url + "get_articles.php";
    const post_url = base_url + "add_article.php";

    const response = await workshop_pages.getAPI(articles_url);
    /*const data = response.data;

    const list = document.getElementById("my_articles");
    for(let i = 0; i < data.length; i++){
        list.innerHTML += "<li>" + data[i].name+ "-"+ data[i].author+ "</li> <br>";
    }
    const title = document.getElementById("title");
    const article_id = document.getElementById("article_id");
    title.innerText = "Article 1: " + data[0].name;


    const btn = document.getElementById("article_btn");
    btn.addEventListener("click", async function(){
        const id = article_id.value;
        const article_url = base_url + "get_article.php?id=" + id;
        const response_article = await workshop_pages.getAPI(article_url);
        const article = response_article.data;
        console.log(article);
        const article_div = document.getElementById("article_desc");
        article_div.innerHTML = "<h1> " + article.name + "</h1>"; 
        article_div.style.display = "block";
    });*/

    const post_data = {
        name: "JS Article",
        author: "CDaoud",
        location: "Byblos"
    };

    workshop_pages.postAPI(post_url, post_data);

}

workshop_pages.load_profile = () => {
    alert("HI FROM PROFILE PAGE");
}