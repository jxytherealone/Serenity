let userName = "admin";
let pwd = "1234";

function redirectToPage() {
    var userID = document.getElementById("userID").value;
    var password = document.getElementById("password").value;

    if(localStorage.getItem('updatedUsername')) {
      pwd = localStorage.getItem('updatedPassword');
      userName = localStorage.getItem('updatedUsername');
    }
    if (userID == userName && password == pwd) {
        window.location.href = "dashboard.html";
    }else {
        alert("Incorrect user name or password!");
    }
}

function myFunction() {
    var element = document.querySelector('.menu_section');
    element.classList.toggle("menu_section_d");

    var element = document.querySelector('.readingSection');
    element.classList.toggle("readingSection_d");

    var element1 = document.querySelector('.notes');
    element1.classList.toggle("notes_d");

    var element2 = document.querySelector('.yoga_dis');
    element2.classList.toggle("yoga_dis_d");

    var element3 = document.querySelector('.footer_b');
    element3.classList.toggle("footer_b_d");
}



(function() {
  $(document).ready(function() {
    var walkthrough;
    walkthrough = {
      index: 0,
      nextScreen: function() {
        if (this.index < this.indexMax()) {
          this.index++;
          return this.updateScreen();
        }
      },
      prevScreen: function() {
        if (this.index > 0) {
          this.index--;
          return this.updateScreen();
        }
      },
      updateScreen: function() {
        this.reset();
        this.goTo(this.index);
        return this.setBtns();
      },
      setBtns: function() {
        var $lastBtn, $nextBtn, $prevBtn;
        $nextBtn = $('.next-screen');
        $prevBtn = $('.prev-screen');
        $lastBtn = $('.finish');
        if (walkthrough.index === walkthrough.indexMax()) {
          $nextBtn.prop('disabled', true);
          $prevBtn.prop('disabled', false);
          return $lastBtn.addClass('active').prop('disabled', false);
        } else if (walkthrough.index === 0) {
          $nextBtn.prop('disabled', false);
          $prevBtn.prop('disabled', true);
          return $lastBtn.removeClass('active').prop('disabled', true);
        } else {
          $nextBtn.prop('disabled', false);
          $prevBtn.prop('disabled', false);
          return $lastBtn.removeClass('active').prop('disabled', true);
        }
      },
      goTo: function(index) {
        $('.screen').eq(index).addClass('active');
        return $('.dot').eq(index).addClass('active');
      },
      reset: function() {
        return $('.screen, .dot').removeClass('active');
      },
      indexMax: function() {
        return $('.screen').length - 1;
      },
      closeModal: function() {
        $('.walkthrough, .shade').removeClass('reveal');
        return setTimeout((() => {
          $('.walkthrough, .shade').removeClass('show');
          this.index = 0;
          return this.updateScreen();
        }), 200);
      },
      openModal: function() {
        $('.walkthrough, .shade').addClass('show');
        setTimeout((() => {
          return $('.walkthrough, .shade').addClass('reveal');
        }), 200);
        return this.updateScreen();
      }
    };
    $('.next-screen').click(function() {
      return walkthrough.nextScreen();
    });
    $('.prev-screen').click(function() {
      return walkthrough.prevScreen();
    });
    $('.close').click(function() {
      return walkthrough.closeModal();
    });
    $('.open-walkthrough').click(function() {
      return walkthrough.openModal();
    });
    walkthrough.openModal();
    
    // Optionally use arrow keys to navigate walkthrough
    return $(document).keydown(function(e) {
      switch (e.which) {
        case 37:
          // left
          walkthrough.prevScreen();
          break;
        case 38:
          // up
          walkthrough.openModal();
          break;
        case 39:
          // right
          walkthrough.nextScreen();
          break;
        case 40:
          // down
          walkthrough.closeModal();
          break;
        default:
          return;
      }
      e.preventDefault();
    });
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFBQSxDQUFBLENBQUUsUUFBRixDQUFXLENBQUMsS0FBWixDQUFrQixRQUFBLENBQUEsQ0FBQTtBQUNsQixRQUFBO0lBQUUsV0FBQSxHQUNFO01BQUEsS0FBQSxFQUFPLENBQVA7TUFFQSxVQUFBLEVBQVksUUFBQSxDQUFBLENBQUE7UUFDVixJQUFHLElBQUMsQ0FBQSxLQUFELEdBQVMsSUFBQyxDQUFBLFFBQUQsQ0FBQSxDQUFaO1VBQ0UsSUFBQyxDQUFBLEtBQUQ7aUJBQ0EsSUFBQyxDQUFBLFlBQUQsQ0FBQSxFQUZGOztNQURVLENBRlo7TUFPQSxVQUFBLEVBQVksUUFBQSxDQUFBLENBQUE7UUFDVixJQUFHLElBQUMsQ0FBQSxLQUFELEdBQVMsQ0FBWjtVQUNFLElBQUMsQ0FBQSxLQUFEO2lCQUNBLElBQUMsQ0FBQSxZQUFELENBQUEsRUFGRjs7TUFEVSxDQVBaO01BWUEsWUFBQSxFQUFjLFFBQUEsQ0FBQSxDQUFBO1FBQ1osSUFBQyxDQUFBLEtBQUQsQ0FBQTtRQUNBLElBQUMsQ0FBQSxJQUFELENBQU0sSUFBQyxDQUFBLEtBQVA7ZUFDQSxJQUFDLENBQUEsT0FBRCxDQUFBO01BSFksQ0FaZDtNQWlCQSxPQUFBLEVBQVMsUUFBQSxDQUFBLENBQUE7QUFDYixZQUFBLFFBQUEsRUFBQSxRQUFBLEVBQUE7UUFBTSxRQUFBLEdBQVcsQ0FBQSxDQUFFLGNBQUY7UUFDWCxRQUFBLEdBQVcsQ0FBQSxDQUFFLGNBQUY7UUFDWCxRQUFBLEdBQVcsQ0FBQSxDQUFFLFNBQUY7UUFFWCxJQUFHLFdBQVcsQ0FBQyxLQUFaLEtBQXFCLFdBQVcsQ0FBQyxRQUFaLENBQUEsQ0FBeEI7VUFDRSxRQUFRLENBQUMsSUFBVCxDQUFjLFVBQWQsRUFBMEIsSUFBMUI7VUFDQSxRQUFRLENBQUMsSUFBVCxDQUFjLFVBQWQsRUFBMEIsS0FBMUI7aUJBQ0EsUUFB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TyxDQUFDLENBQUMsS0FBVDtBQUFBLGFBQ08sRUFEUDs7VUFHSSxXQUFXLENBQUMsVUFBWixDQUFBO0FBRkc7QUFEUCxhQUlPLEVBSlA7O1VBTUksV0FBVyxDQUFDLFNBQVosQ0FBQTtBQUZHO0FBSlAsYUFPTyxFQVBQOztVQVNJLFdBQVcsQ0FBQyxVQUFaLENBQUE7QUFGRztBQVBQLGFBVU8sRUFWUDs7VUFZSSxXQUFXLENBQUMsVUFBWixDQUFBO0FBRkc7QUFWUDtBQWNJO0FBZEo7TUFlQSxDQUFDLENBQUMsY0FBRixDQUFBO0lBaEJrQixDQUFwQjtFQWhGZ0IsQ0FBbEI7QUFBQSIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5IC0+XG4gIHdhbGt0aHJvdWdoID1cbiAgICBpbmRleDogMFxuICAgIFxuICAgIG5leHRTY3JlZW46IC0+XG4gICAgICBpZiBAaW5kZXggPCBAaW5kZXhNYXgoKVxuICAgICAgICBAaW5kZXgrK1xuICAgICAgICBAdXBkYXRlU2NyZWVuKClcblxuICAgIHByZXZTY3JlZW46IC0+XG4gICAgICBpZiBAaW5kZXggPiAwXG4gICAgICAgIEBpbmRleC0tXG4gICAgICAgIEB1cGRhdGVTY3JlZW4oKVxuICAgICAgICBcbiAgICB1cGRhdGVTY3JlZW46IC0+XG4gICAgICBAcmVzZXQoKVxuICAgICAgQGdvVG8gQGluZGV4XG4gICAgICBAc2V0QnRucygpXG4gICAgICBcbiAgICBzZXRCdG5zOiAtPlxuICAgICAgJG5leHRCdG4gPSAkKCcubmV4dC1zY3JlZW4nKVxuICAgICAgJHByZXZCdG4gPSAkKCcucHJldi1zY3JlZW4nKVxuICAgICAgJGxhc3RCdG4gPSAkKCcuZmluaXNoJylcbiAgICAgIFxuICAgICAgaWYgd2Fsa3Rocm91Z2guaW5kZXggPT0gd2Fsa3Rocm91Z2guaW5kZXhNYXgoKVxuICAgICAgICAkbmV4dEJ0bi5wcm9wKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAkcHJldkJ0bi5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKTtcbiAgICAgICAgJGxhc3RCdG4uYWRkQ2xhc3MoJ2FjdGl2ZScpLnByb3AoJ2Rpc2FibGVkJywgZmFsc2UpO1xuICAgICAgICBcbiAgICAgIGVsc2UgaWYgd2Fsa3Rocm91Z2guaW5kZXggPT0gMFxuICAgICAgICAkbmV4dEJ0bi5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKVxuICAgICAgICAkcHJldkJ0bi5wcm9wKCdkaXNhYmxlZCcsIHRydWUpXG4gICAgICAgICRsYXN0QnRuLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5wcm9wKCdkaXNhYmxlZCcsIHRydWUpXG4gICAgICAgIFxuICAgICAgZWxzZVxuICAgICAgICAkbmV4dEJ0bi5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKVxuICAgICAgICAkcHJldkJ0bi5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKVxuICAgICAgICAkbGFzdEJ0bi5yZW1vdmVDbGFzcygnYWN0aXZlJykucHJvcCgnZGlzYWJsZWQnLCB0cnVlKVxuXG5cbiAgICBnb1RvOiAoaW5kZXgpIC0+XG4gICAgICAkKCcuc2NyZWVuJykuZXEoaW5kZXgpLmFkZENsYXNzICdhY3RpdmUnXG4gICAgICAkKCcuZG90JykuZXEoaW5kZXgpLmFkZENsYXNzICdhY3RpdmUnXG5cbiAgICByZXNldDogLT5cbiAgICAgICQoJy5zY3JlZW4sIC5kb3QnKS5yZW1vdmVDbGFzcyAnYWN0aXZlJ1xuXG4gICAgaW5kZXhNYXg6IC0+XG4gICAgICAkKCcuc2NyZWVuJykubGVuZ3RoIC0gMVxuXG4gICAgY2xvc2VNb2RhbDogLT5cbiAgICAgICQoJy53YWxrdGhyb3VnaCwgLnNoYWRlJykucmVtb3ZlQ2xhc3MoJ3JldmVhbCcpXG4gICAgICBzZXRUaW1lb3V0ICg9PlxuICAgICAgICAkKCcud2Fsa3Rocm91Z2gsIC5zaGFkZScpLnJlbW92ZUNsYXNzKCdzaG93JylcbiAgICAgICAgQGluZGV4ID0gMFxuICAgICAgICBAdXBkYXRlU2NyZWVuKClcbiAgICAgICksIDIwMFxuXG4gICAgb3Blbk1vZGFsOiAtPlxuICAgICAgJCgnLndhbGt0aHJvdWdoLCAuc2hhZGUnKS5hZGRDbGFzcygnc2hvdycpXG4gICAgICBzZXRUaW1lb3V0ICg9PlxuICAgICAgICAkKCcud2Fsa3Rocm91Z2gsIC5zaGFkZScpLmFkZENsYXNzKCdyZXZlYWwnKVxuICAgICAgKSwgMjAwXG4gICAgICBAdXBkYXRlU2NyZWVuKClcblxuICAkKCcubmV4dC1zY3JlZW4nKS5jbGljayAtPlxuICAgIHdhbGt0aHJvdWdoLm5leHRTY3JlZW4oKVxuXG4gICQoJy5wcmV2LXNjcmVlbicpLmNsaWNrIC0+XG4gICAgd2Fsa3Rocm91Z2gucHJldlNjcmVlbigpXG5cbiAgJCgnLmNsb3NlJykuY2xpY2sgLT5cbiAgICB3YWxrdGhyb3VnaC5jbG9zZU1vZGFsKClcbiAgICBcbiAgJCgnLm9wZW4td2Fsa3Rocm91Z2gnKS5jbGljayAtPlxuICAgIHdhbGt0aHJvdWdoLm9wZW5Nb2RhbCgpXG4gICAgXG4gIHdhbGt0aHJvdWdoLm9wZW5Nb2RhbCgpXG4gXG4gICMgT3B0aW9uYWxseSB1c2UgYXJyb3cga2V5cyB0byBuYXZpZ2F0ZSB3YWxrdGhyb3VnaFxuICAkKGRvY3VtZW50KS5rZXlkb3duIChlKSAtPlxuICAgIHN3aXRjaCBlLndoaWNoXG4gICAgICB3aGVuIDM3XG4gICAgICAgICMgbGVmdFxuICAgICAgICB3YWxrdGhyb3VnaC5wcmV2U2NyZWVuKClcbiAgICAgIHdoZW4gMzhcbiAgICAgICAgIyB1cFxuICAgICAgICB3YWxrdGhyb3VnaC5vcGVuTW9kYWwoKVxuICAgICAgd2hlbiAzOVxuICAgICAgICAjIHJpZ2h0XG4gICAgICAgIHdhbGt0aHJvdWdoLm5leHRTY3JlZW4oKVxuICAgICAgd2hlbiA0MFxuICAgICAgICAjIGRvd25cbiAgICAgICAgd2Fsa3Rocm91Z2guY2xvc2VNb2RhbCgpXG4gICAgICBlbHNlXG4gICAgICAgIHJldHVyblxuICAgIGUucHJldmVudERlZmF1bHQoKVxuICAgIHJldHVybiJdfQ==
//# sourceURL=coffeescript


function downloadPDF() {
  var link = document.createElement('a');
  link.href = 'your-pdf-file.pdf';
  link.download = 'your-pdf-file.pdf';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

const target = {
  clicked: 0,
  currentFollowers: 90,
  btn: document.querySelector("a.btn"),
  fw: document.querySelector("span.followers")
};

const follow = () => {
  target.clicked += 1;
  target.btn.innerHTML = 'Following <i class="fas fa-user-times"></i>';

  if (target.clicked % 2 === 0) {
    target.currentFollowers -= 1;
    target.btn.innerHTML = 'Follow <i class="fas fa-user-plus"></i>';
  }
  else {
    target.currentFollowers += 1;
  }

  target.fw.textContent = target.currentFollowers;
  target.btn.classList.toggle("following");
}
