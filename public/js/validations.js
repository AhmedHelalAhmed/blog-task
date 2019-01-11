$( document ).ready(function() {



    // for performance when click edit redirect with out request if the data does not modified at all
    // for post
    let oldTitle=$("#title");
    let oldDescription=$("#description");
    let oldContent=$("#content");
    let oldCategory=$("#category");
    // for category
    let oldCategoryName=$("#category-name");








    
    $("#submit-btn").on("click",function(e){
        e.preventDefault();
        // inputs
        let title=$("#title");
        let titleFeedback=$("#title-feedback");
        let description=$("#description");
        let descriptionFeedback=$("#description-feedback");
        let content=$("#content");
        let contentFeedback=$("#content-feedback");
        let category=$("#category");
        let categoryFeedback=$("#category-feedback");

        // for performance
        if(title.val()===oldTitle.val()&&oldDescription.val()===description.val()&&oldContent.val()===content.val()&&category.val()===oldCategory.val())
        {
            // alert("no change happened");
            window.location.href("/admin/posts");
        }




        // validate title
        // title is required
        let titleValue=title.val().trim();//remove spaces
        if(!titleValue)
        {
            title.addClass("has-error");
            titleFeedback.text("Title is required");
            titleFeedback.addClass("danger");
            return false;
        }
        let charactersInTitle=titleValue.length;
        // title is min 3
        if(charactersInTitle<3)
        {
            title.addClass("has-error");
            titleFeedback.text("Title must be 3 characters at least");
            titleFeedback.addClass("danger");
            return false;
        }
        // title is max 70
        if(charactersInTitle>70)
        {
            title.addClass("has-error");
            titleFeedback.text("Title must be 70 characters at most");
            titleFeedback.addClass("danger");
            return false;
        }
        titleFeedback.removeClass("danger").addClass("success");
        title.removeClass("has-error").addClass("has-no-error");
        titleFeedback.text("Title is good");


        // description
        let descriptionValue=description.val().trim();//remove spaces
        if(!titleValue)
        {
            description.addClass("has-error");
            descriptionFeedback.text("Description is required");
            descriptionFeedback.addClass("danger");
            return false;
        }
        let charactersInDescription=descriptionValue.length;
        // description is min 35
        if(charactersInDescription<35)
        {
            description.addClass("has-error");
            descriptionFeedback.text("Description must be 35 characters at least");
            descriptionFeedback.addClass("danger");
            return false;
        }
        // description is max 100
        if(charactersInDescription>100)
        {
            description.addClass("has-error");
            descriptionFeedback.text("Description must be 100 characters at most");
            descriptionFeedback.addClass("danger");
            return false;
        }
        descriptionFeedback.removeClass("danger").addClass("success");
        description.removeClass("has-error").addClass("has-no-error");
        descriptionFeedback.text("Description is good");

        // content
        let contentValue=content.val().trim();//remove spaces
        if(!contentValue)
        {
            content.addClass("has-error");
            contentFeedback.text("Content is required");
            contentFeedback.addClass("danger");
            return false;
        }
        let charactersInContent=contentValue.length;
        // content is min 100
        if(charactersInContent<100)
        {
            content.addClass("has-error");
            contentFeedback.text("Content must be 100 characters at least");
            contentFeedback.addClass("danger");
            return false;
        }
        contentFeedback.removeClass("danger").addClass("success");
        content.removeClass("has-error").addClass("has-no-error");

        contentFeedback.text("Content is good");


        // category
        let categoryValue=category.val().trim();//remove spaces
        if(!categoryValue)
        {
            category.addClass("has-error");
            categoryFeedback.text("Category is required please select one");
            categoryFeedback.addClass("danger");
            return false;
        }
        categoryFeedback.removeClass("danger").addClass("success");
        category.removeClass("has-error").addClass("has-no-error");
        categoryFeedback.text("Category is good");

        $("#post-form").submit();

    });











    $("#submit-btn-category").on("click",function(e){
        e.preventDefault();
        // input
        let categoryName=$("#category-name");
        let categoryNameFeedback=$("#category-name-feedback");


        // for performance
        if(oldCategoryName.val()===categoryName.val())
        {
            // alert("no change happened");
            window.location.href("/admin/categories");
        }


        // validate name
        // name is required
        let nameValue=categoryName.val().trim();//remove spaces
        if(!nameValue)
        {
            categoryName.addClass("has-error");
            categoryNameFeedback.text("Name is required");
            categoryNameFeedback.addClass("danger");
            return false;
        }
        let charactersInName=nameValue.length;
        // name is min 3
        if(charactersInName<3)
        {
            categoryName.addClass("has-error");
            categoryNameFeedback.text("Name must be 3 characters at least");
            categoryNameFeedback.addClass("danger");
            return false;
        }
        categoryNameFeedback.removeClass("danger").addClass("success");
        categoryName.removeClass("has-error").addClass("has-no-error");
        categoryNameFeedback.text("Title is good");


        categoryNameFeedback.removeClass("danger").addClass("success");
        categoryName.removeClass("has-error").addClass("has-no-error");
        categoryNameFeedback.text("Category is good");
        $("#category-form").submit();

    });
    
    
    
    
    

});


