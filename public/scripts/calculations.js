function NumberToLetter(nombre, U=null, D=null) {
    	
    var letter = {
    0: "zéro",
    1: "un",
    2: "deux",
    3: "trois",
    4: "quatre",
    5: "cinq",
    6: "six",
    7: "sept",
    8: "huit",
    9: "neuf",
    10: "dix",
    11: "onze",
    12: "douze",
    13: "treize",
    14: "quatorze",
    15: "quinze",
    16: "seize",
    17: "dix-sept",
    18: "dix-huit",
    19: "dix-neuf",
    20: "vingt",
    30: "trente",
    40: "quarante",
    50: "cinquante",
    60: "soixante",
    70: "soixante-dix",
    80: "quatre-vingt",
    90: "quatre-vingt-dix",
  };
    
      var i, j, n, quotient, reste, nb;
      var ch
      var numberToLetter = '';
      //__________________________________
  
      if (nombre.toString().replace(/ /gi, "").length > 15) return "dépassement de capacité";
      if (isNaN(nombre.toString().replace(/ /gi, ""))) return "Nombre non valide";
  
      nb = parseFloat(nombre.toString().replace(/ /gi, ""));
      //if (Math.ceil(nb) != nb) return "Nombre avec virgule non géré.";
  if(Math.ceil(nb) != nb){
    nb = nombre.toString().split('.');
    //return NumberToLetter(nb[0]) + " virgule " + NumberToLetter(nb[1]);
    return NumberToLetter(nb[0]) + (U ? " " + U + " et " : " virgule ") + NumberToLetter(nb[1]) + (D ? " " + D : "");
      }
      
      n = nb.toString().length;
      switch (n) {
          case 1:
              numberToLetter = letter[nb];
              break;
          case 2:
              if (nb > 19) {
                  quotient = Math.floor(nb / 10);
                  reste = nb % 10;
                  if (nb < 71 || (nb > 79 && nb < 91)) {
                      if (reste == 0) numberToLetter = letter[quotient * 10];
                      if (reste == 1) numberToLetter = letter[quotient * 10] + "-et-" + letter[reste];
                      if (reste > 1) numberToLetter = letter[quotient * 10] + "-" + letter[reste];
                  } else numberToLetter = letter[(quotient - 1) * 10] + "-" + letter[10 + reste];
              } else numberToLetter = letter[nb];
              break;
          case 3:
              quotient = Math.floor(nb / 100);
              reste = nb % 100;
              if (quotient == 1 && reste == 0) numberToLetter = "cent";
              if (quotient == 1 && reste != 0) numberToLetter = "cent" + " " + NumberToLetter(reste);
              if (quotient > 1 && reste == 0) numberToLetter = letter[quotient] + " cents";
              if (quotient > 1 && reste != 0) numberToLetter = letter[quotient] + " cent " + NumberToLetter(reste);
              break;
          case 4 :
          case 5 :
          case 6 :
              quotient = Math.floor(nb / 1000);
              reste = nb - quotient * 1000;
              if (quotient == 1 && reste == 0) numberToLetter = "mille";
              if (quotient == 1 && reste != 0) numberToLetter = "mille" + " " + NumberToLetter(reste);
              if (quotient > 1 && reste == 0) numberToLetter = NumberToLetter(quotient) + " mille";
              if (quotient > 1 && reste != 0) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
              break;
          case 7:
          case 8:
          case 9:
              quotient = Math.floor(nb / 1000000);
              reste = nb % 1000000;
              if (quotient == 1 && reste == 0) numberToLetter = "un million";
              if (quotient == 1 && reste != 0) numberToLetter = "un million" + " " + NumberToLetter(reste);
              if (quotient > 1 && reste == 0) numberToLetter = NumberToLetter(quotient) + " millions";
              if (quotient > 1 && reste != 0) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
              break;
          case 10:
          case 11:
          case 12:
              quotient = Math.floor(nb / 1000000000);
              reste = nb - quotient * 1000000000;
              if (quotient == 1 && reste == 0) numberToLetter = "un milliard";
              if (quotient == 1 && reste != 0) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
              if (quotient > 1 && reste == 0) numberToLetter = NumberToLetter(quotient) + " milliards";
              if (quotient > 1 && reste != 0) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
              break;
          case 13:
          case 14:
          case 15:
              quotient = Math.floor(nb / 1000000000000);
              reste = nb - quotient * 1000000000000;
              if (quotient == 1 && reste == 0) numberToLetter = "un billion";
              if (quotient == 1 && reste != 0) numberToLetter = "un billion" + " " + NumberToLetter(reste);
              if (quotient > 1 && reste == 0) numberToLetter = NumberToLetter(quotient) + " billions";
              if (quotient > 1 && reste != 0) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
              break;
      }//fin switch
      /*respect de l'accord de quatre-vingt*/
      if (numberToLetter.substr(numberToLetter.length - "quatre-vingt".length, "quatre-vingt".length) == "quatre-vingt") numberToLetter = numberToLetter + "s";
  
      return numberToLetter;
  
  }
  

function calculateOnLoad(){
    $(".prix_vente").each(function(){
        // calculate each row total
        var $row = $(this).closest("tr");
        var prix_vente = $(this).val();
        var quantite = $row.find(".quantite").val();
        var total = prix_vente * quantite;
        $row.find(".pht").val(total);
        // calculate each row margin
        var $row = $(this).closest("tr");
        var prix_achat = $row.find(".prix_achat").val();
        var prix_vente = $(this).val();
        var marge = prix_vente - prix_achat;
        $row.find(".marge").val(marge);
        // total margin
        var total_marge = 0;
        $(".marge").each(function(){
            total_marge += +$(this).val();
        });
        $("#total_marge").val(total_marge);
        // total vente 
        var total_vente = 0;
        $(".prix_vente").each(function(){
            total_vente += +$(this).val();
        });
        $("#vente").val(total_vente);
        // total tva
        var total_taxe = 0;
        $(".pht").each(function(){
            taxe = $(this).closest("tr").find(".taxe").val();
            pht = $(this).val();
            total_taxe += +pht * +taxe;
        });
        $("#tva").val(total_taxe);
        // total ttc
        var total_ttc = 0;
        var vente = $("#vente").val();
        var taxe = $("#tva").val();
        total_ttc = +vente + +taxe;
        $("#ttc").val(total_ttc);
        // ttc_towords
        var ttc = $("#ttc").val();
        var ttc_towords = NumberToLetter(ttc);
        console.log(ttc_towords);
        $("#ttc_towords").val(ttc_towords);
    });

    $(".quantite").each(function(){
        // calculate each row total
        var $row = $(this).closest("tr");
        var prix_vente = $row.find(".prix_vente").val();
        var quantite = $row.find(".quantite").val();
        var total = prix_vente * quantite;
        $row.find(".pht").val(total);
        // total tva
        var total_taxe = 0;
        $(".pht").each(function(){
            taxe = $(this).closest("tr").find(".taxe").val();
            pht = $(this).val();
            total_taxe += +pht * +taxe;
        });
        $("#tva").val(total_taxe);
        // total ttc
        var total_ttc = 0;
        var vente = $("#vente").val();
        var taxe = $("#tva").val();
        total_ttc = +vente + +taxe;
        $("#ttc").val(total_ttc);
        // ttc_towords
        var ttc = $("#ttc").val();
        var ttc_towords = NumberToLetter(ttc);
        $("#ttc_towords").val(ttc_towords);
    });

    // on change taxe
    $(".taxe").each(function(){
        // calculate each row total
        var $row = $(this).closest("tr");
        var prix_vente = $row.find(".prix_vente").val();
        var quantite = $row.find(".quantite").val();
        var total = prix_vente * quantite;
        $row.find(".pht").val(total);
        // total tva
        var total_taxe = 0;
        $(".pht").each(function(){
            taxe = $(this).closest("tr").find(".taxe").val();
            pht = $(this).val();
            total_taxe += +pht * +taxe;
        });
        $("#tva").val(total_taxe);
        // total ttc
        var total_ttc = 0;
        var vente = $("#vente").val();
        var taxe = $("#tva").val();
        total_ttc = +vente + +taxe;
        $("#ttc").val(total_ttc);
        // ttc_towords
        var ttc = $("#ttc").val();
        var ttc_towords = NumberToLetter(ttc);
        $("#ttc_towords").val(ttc_towords);
    });

    $(".prix_achat").each(function(){
        // calculate each row margin
        var $row = $(this).closest("tr");
        var prix_achat = $(this).val();
        var prix_vente = $row.find(".prix_vente").val();
        var marge = prix_vente - prix_achat;
        $row.find(".marge").val(marge);
        // total margin
        var total_marge = 0;
        $(".marge").each(function(){
            total_marge += +$(this).val();
        });
        $("#total_marge").val(total_marge);
        // total achat
        var total_achat = 0;
        $(".prix_achat").each(function(){
            total_achat += +$(this).val();
        });
        $("#achat").val(total_achat);
        // total tva
        var total_taxe = 0;
        $(".pht").each(function(){
            taxe = $(this).closest("tr").find(".taxe").val();
            pht = $(this).val();
            console.log(pht + " " + taxe);
            total_taxe += +pht * +taxe;
        });
        $("#tva").val(total_taxe);
        // total ttc
        var total_ttc = 0;
        var vente = $("#vente").val();
        var taxe = $("#tva").val();
        total_ttc = +vente + +taxe;
        $("#ttc").val(total_ttc);
        // ttc_towords
        var ttc = $("#ttc").val();
        var ttc_towords = NumberToLetter(ttc);
        $("#ttc_towords").val(ttc_towords);
    });
}

function calculateOnChange(){
    $(".prix_vente").keyup(function(){
    // calculate each row total
    var $row = $(this).closest("tr");
    var prix_vente = $(this).val();
    var quantite = $row.find(".quantite").val();
    var total = prix_vente * quantite;
    $row.find(".pht").val(total);
    // calculate each row margin
    var $row = $(this).closest("tr");
    var prix_achat = $row.find(".prix_achat").val();
    var prix_vente = $(this).val();
    var marge = prix_vente - prix_achat;
    $row.find(".marge").val(marge);
    // total margin
    var total_marge = 0;
    $(".marge").each(function(){
        total_marge += +$(this).val();
    });
    $("#total_marge").val(total_marge);
    // total vente 
    var total_vente = 0;
    $(".prix_vente").each(function(){
        total_vente += +$(this).val();
    });
    $("#vente").val(total_vente);
    // total tva
    var total_taxe = 0;
    $(".pht").each(function(){
        taxe = $(this).closest("tr").find(".taxe").val();
        pht = $(this).val();
        total_taxe += +pht * +taxe;
    });
    $("#tva").val(total_taxe);
    // total ttc
    var total_ttc = 0;
    var vente = $("#vente").val();
    var taxe = $("#tva").val();
    total_ttc = +vente + +taxe;
    $("#ttc").val(total_ttc);
    // ttc_towords
    var ttc = $("#ttc").val();
    var ttc_towords = NumberToLetter(ttc);
    console.log(ttc_towords);
    $("#ttc_towords").val(ttc_towords);
});

$(".quantite").keyup(function(){
    // calculate each row total
    var $row = $(this).closest("tr");
    var prix_vente = $row.find(".prix_vente").val();
    var quantite = $row.find(".quantite").val();
    var total = prix_vente * quantite;
    $row.find(".pht").val(total);
    // total tva
    var total_taxe = 0;
    $(".pht").each(function(){
        taxe = $(this).closest("tr").find(".taxe").val();
        pht = $(this).val();
        total_taxe += +pht * +taxe;
    });
    $("#tva").val(total_taxe);
    // total ttc
    var total_ttc = 0;
    var vente = $("#vente").val();
    var taxe = $("#tva").val();
    total_ttc = +vente + +taxe;
    $("#ttc").val(total_ttc);
    // ttc_towords
    var ttc = $("#ttc").val();
    var ttc_towords = NumberToLetter(ttc);
    $("#ttc_towords").val(ttc_towords);
});

// on change taxe
$(".taxe").change(function(){
    // calculate each row total
    var $row = $(this).closest("tr");
    var prix_vente = $row.find(".prix_vente").val();
    var quantite = $row.find(".quantite").val();
    var total = prix_vente * quantite;
    $row.find(".pht").val(total);
    // total tva
    var total_taxe = 0;
    $(".pht").each(function(){
        taxe = $(this).closest("tr").find(".taxe").val();
        pht = $(this).val();
        total_taxe += +pht * +taxe;
    });
    $("#tva").val(total_taxe);
    // total ttc
    var total_ttc = 0;
    var vente = $("#vente").val();
    var taxe = $("#tva").val();
    total_ttc = +vente + +taxe;
    $("#ttc").val(total_ttc);
    // ttc_towords
    var ttc = $("#ttc").val();
    var ttc_towords = NumberToLetter(ttc);
    $("#ttc_towords").val(ttc_towords);
});

$(".prix_achat").keyup(function(){
    // calculate each row margin
    var $row = $(this).closest("tr");
    var prix_achat = $(this).val();
    var prix_vente = $row.find(".prix_vente").val();
    var marge = prix_vente - prix_achat;
    $row.find(".marge").val(marge);
    // total margin
    var total_marge = 0;
    $(".marge").each(function(){
        total_marge += +$(this).val();
    });
    $("#total_marge").val(total_marge);
    // total achat
    var total_achat = 0;
    $(".prix_achat").each(function(){
        total_achat += +$(this).val();
    });
    $("#achat").val(total_achat);
    // total tva
    var total_taxe = 0;
    $(".pht").each(function(){
        taxe = $(this).closest("tr").find(".taxe").val();
        pht = $(this).val();
        console.log(pht + " " + taxe);
        total_taxe += +pht * +taxe;
    });
    $("#tva").val(total_taxe);
    // total ttc
    var total_ttc = 0;
    var vente = $("#vente").val();
    var taxe = $("#tva").val();
    total_ttc = +vente + +taxe;
    $("#ttc").val(total_ttc);
    // ttc_towords
    var ttc = $("#ttc").val();
    var ttc_towords = NumberToLetter(ttc);
    $("#ttc_towords").val(ttc_towords);
});
}