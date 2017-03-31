var compteur = function(div, start, end, pas, vit)
{
    this.div = document.querySelector(div);
    this.start = start;
    this.end = end;
    this.count = start;
    this.pas = pas;
    this.boucle = function()
    {
      var that = this;
      function update()
      {
        if(that.count >= end)
        {
        }
        else
        {
          that.count += pas;
          that.div.innerText = that.count;
        }

      }
      setInterval(update,vit);
    }
  }

var first = new compteur('#first-nb', 0, 3604, 4, 1);
first.boucle();
var second = new compteur('#seconde_nb', 0, 164, 1, 22);
second.boucle();
