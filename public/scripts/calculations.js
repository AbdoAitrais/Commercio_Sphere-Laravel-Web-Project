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
        // towords
        var ttc = $("#ttc").val();
        var towords = NumberToLetter(ttc);
        console.log(towords);
        $("#towords").val(towords);
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
        // towords
        var ttc = $("#ttc").val();
        var towords = NumberToLetter(ttc);
        $("#towords").val(towords);
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
        // towords
        var ttc = $("#ttc").val();
        var towords = NumberToLetter(ttc);
        $("#towords").val(towords);
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
        // towords
        var ttc = $("#ttc").val();
        var towords = NumberToLetter(ttc);
        $("#towords").val(towords);
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
    // towords
    var ttc = $("#ttc").val();
    var towords = NumberToLetter(ttc);
    console.log(towords);
    $("#towords").val(towords);
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
    // towords
    var ttc = $("#ttc").val();
    var towords = NumberToLetter(ttc);
    $("#towords").val(towords);
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
    // towords
    var ttc = $("#ttc").val();
    var towords = NumberToLetter(ttc);
    $("#towords").val(towords);
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
    // towords
    var ttc = $("#ttc").val();
    var towords = NumberToLetter(ttc);
    $("#towords").val(towords);
});
}