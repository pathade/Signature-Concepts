alert('fin yr')
function getFinYr()
{
    var date = new Date();
    var year = (""+date.getFullYear()).substring(2);
    var prevYear = (""+date.getFullYear()-1).substring(2);

    var finYr = {
        'year': year,
        'prevYear': prevYear
    }

    return finYr;

}