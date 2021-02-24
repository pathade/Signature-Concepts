
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
    html {
  text-rendering: optimizeLegibility;
  padding: 0 50px 50px;
  font-family: "Helvetica Neue", sans-serif;
  font-weight: 300;
}

textarea {
  font-family: monospace;
  display: block;
  width: 100%;
  height: 200px; 
  margin: 1em auto;
}

table {
  line-height: 1.1;
  border-bottom: 1px solid #888;
  margin:1em auto 2em;

  tr {
    border-top: 1px solid #888;
  }
  td, th {
    font-weight: normal;
    padding: .5em 1em;
    text-align: right;
    &:first-child {
      text-align: left;
    }
  }
}

#convert {
  padding: .5em 1em;
  border-radius: .4em;
}
</style>

<h1>Excel to HTML Table</h1>
<p>Paste from Excel into the box below and press convert:</p>

<textarea name="inney" id="inney" cols="30" rows="10"></textarea>
<button id='convert'>Convert</button>

<p>Copy the code below (just press cmd/ctrl c):</p>

<textarea id="output" disabled></textarea>

Sample Output:
<div id="render"></div>
<script>
$('#convert').click(function(){
  x = $('#inney').val();
  x = x.split('\t').join('</td><td>');
  x = x.split('\n').join('</td>\n\t</tr>\n\t<tr>\n\t\t<td>');
  x = '<table>\n\t<tr>\n\t\t<td>' + x + '</td>\n\t</tr>\n</table>\n';
  $('#output').text(x).focus().select();
  $('#render').html(x);
});

</script>