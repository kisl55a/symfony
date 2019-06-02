const articles = document.getElementById('articles');
if (articles){
    articles.addEventListener('click',e => {
        if(e.target.className === 'btn btn-danger') {
          if(confirm('Are you sure?')){
            const id = e.target.getAttribute('data-id');
            fetch(`/dima/delete/${id}`,{
                method: 'DELETE'
            }).then(res => window.location.reload());
          }
        }
    })
}