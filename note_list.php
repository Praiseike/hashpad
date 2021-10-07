<style>
    .note-list{
        width: 100%;
        height: 100vh;
        position:absolute;
        overflow:auto;
    }
    .note-card{
        cursor:pointer;
        width: 90%;
        height:100px;
        margin:auto;
        margin-top: 10px;
        background: white;
        border-left: 10px solid blue;
        padding: 10px;
        transition: all 0.2s ease-in-out;
        /* transition: scale(1.01); */
    }

    .note-card:hover{
        border-left: 10px solid green;
        transform: scale(1.01);
    }
    .note-card h2{
        width: 120px;
        float: left;
    }

    .fa-trash{
        margin-top: 20px;
        float: right;
    }

</style>
<div class='note-list'>
<div>


