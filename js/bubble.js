class Error{
    constructor(message = "message"){
        this.message = message
    }
}

class NoNameError extends Error{
    constructor(message = "")
    {
        super(message);
        this.message = message;
    }
}

try{
    d = prompt("Enter your name")
    if(d == "praise")
    {
        throw new Error("this man is a criminal");
    }
    else if(d == "")
    {
        throw new NoNameError("No input for name")
    }
}catch(error)
{
    console.log(error.message)
}