var array = [1,12,2,5,13,17,6,8]

let mergesort =(array) =>
{
    if(array.length === 1)
        return array
    
    let l1 = array.slice(0,array.length/2);
    let l2 = array.slice(array.length/2);
    console.log(l1)
    
    l1 = mergesort(l1);
    l2 = mergesort(l2);

    return merge(l1,l2)
}

let merge = (a,b) =>
{
    c = [];
    while(a.length > 0 && b.length > 0)
    {
        if(a[0] > b[0])
        {
            c.push(b[0])
            b.shift();
        }
        else
        {
            c.push(a[0])
            a.shift();    
        }
    }

    while(a.length > 0)
    {
        c.push(a[0]);
        a.shift();
    }
    
    while(b.length > 0)
    {
        c.push(b[0]);
        b.shift();
    }

    return c;
}