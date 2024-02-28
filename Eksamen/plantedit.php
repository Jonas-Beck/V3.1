<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksamen - plantekalender</title>
    <!--  BOOTSTRAP5 LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<body>
    <header>
        <?php include "includes/header.php"  ?>
    </header>

    <main>
        <section>

            <form method="post" enctype="multipart/form-data">
                <h1><input type="text" name="PName" value="Radise" required></h1>

                <article>
                    <h2><input type="text" name="PSort" value="French Breakfast 3" required></h2>
        
                    <h4><input type="text" name="PBotName" value="Raphanus sativus" required></h4>

                    <input type="submit"name="submitChange" value="Gem">
                    <input type="submit"name="regretChange" value="Fortryd">
                    <input type="submit"name="deletePlant" value="Slet plante">

                </article>

                <article>
                    <label for="PType">Type</label>
                    <select name="PType">
                        <option value="Etårig grøntsag" selected>Etårig grøntsag</option>
                        <option value="Flerårig grøntsag">Flerårig grøntsag</option>
                        <option value="Etårig krydderurt">Etårig krydderurt</option>
                        <option value="Flerårig krydderurt">Flerårig krydderurt</option>
                        <option value="Korn">Korn</option>
                        <option value="Frugt">Frugt</option>
                        <option value="Bær">Bær</option>
                        <option value="Nød">Nød</option>
                        <option value="Andet">Andet</option>
                    </select>

                    <label for="PHeight">Højde</label>
                    <input type="number" name="PHeight" value="10">
                    <span>cm</span>

                    <label for="PSowDist">Såafstand</label>
                    <input type="number" name="PSowDist" value="5">
                    <span>cm</span>

                    <label for="PRowDist">Rækkeafstand</label>
                    <input type="number" name="PRowDist" value="20">
                    <span>cm</span>

                    <label for="PSowDepth">Sådybde</label>
                    <input type="number" name="PSowDepth" value="1">
                    <span>cm</span>

                    <label for="PSqFtNo">Kvadratfod antal (squarefoot gardening)</label>
                    <select name="PSqFtNo">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="9">9</option>
                        <option value="16" selected>16</option>
                    </select>
                            
                    <label for="PLight">Lysforhold</label>
                    <p>Vælg flere ved at holde ctrl nede</p>
                    <select name="PLight[]"multiple size="5">
                        <option value="Fuld skygge" selected>Fuld skygge</option>
                        <option value="Delvis skygge">Delvis skygge</option>
                        <option value="Delvis sol">Delvis sol</option>
                        <option value="Fuld sol">Fuld sol</option>
                        <option value="NA">Ikke relevant</option>
                    </select>

                    <label for="PSowIn">Forspiring</label>
                    <p>Vælg flere ved at holde ctrl nede</p>
                    <select name="PSowIn[]"multiple size=12>
                        <option value="Januar">Januar</option>
                        <option value="Februar">Februar</option>
                        <option value="Marts">Marts</option>
                        <option value="April">April</option>
                        <option value="Maj">Maj</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <label for="PSowOut">Udplantning/såning på friland</label>
                    <p>Vælg flere ved at holde ctrl nede</p>
                    <select name="PSowOut[]"multiple size=12>
                        <option value="Januar">Januar</option>
                        <option value="Februar">Februar</option>
                        <option value="Marts" selected>Marts</option>
                        <option value="April" selected>April</option>
                        <option value="Maj" selected>Maj</option>
                        <option value="Juni" selected>Juni</option>
                        <option value="Juli" selected>Juli</option>
                        <option value="August" selected>August</option>
                        <option value="September" selected>September</option>
                        <option value="Oktober" selected>Oktober</option>
                        <option value="November" selected>November</option>
                        <option value="December" selected>December</option>
                    </select>

                    <label for="PHarvest">Moden til høst</label>
                    <p>Vælg flere ved at holde ctrl nede</p>
                    <select name="PHarvest[]" multiple size=12>
                        <option value="Januar">Januar</option>
                        <option value="Februar">Februar</option>
                        <option value="Marts">Marts</option>
                        <option value="April" selected>April</option>
                        <option value="Maj" selected>Maj</option>
                        <option value="Juni" selected>Juni</option>
                        <option value="Juli" selected>Juli</option>
                        <option value="August" selected>August</option>
                        <option value="September" selected>September</option>
                        <option value="Oktober" selected>Oktober</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <label for="PDesc">Beskrivelse</p>
                    <textarea name="PDesc">'French Breakfast' er måske den hurtigst voksende radise. Du kan nemlig nyde nyhøstede radiser inden for få uger fra såning. French Breakfast har en skarlagenrød farve med en helt hvid spids. Den er lang og slank, dejligt sprød og har en mild og krydret smag. Det britiske haveselskab, Royal Horticultural Society, har givet French Breakfast en udmærkelse for den lækre tekstur og de gode groegenskaber. Der går lige omkring fire uger fra såning til høst. French Breakfast optager ganske lidt plads, er egnet til dyrkning i krukker, potter og kasser og samtidig en god afgrøde at prøve, hvis du er ny inden for hjemmedyrkning og gerne vil se hurtige resultater. SÅVEJLEDNING Du kan som regel så radiser allerede fra marts måned og helt frem til september. Så med 1-2 ugers mellemrum, så du har radiser hele sæsonen. Så tyndt, så udtynding ikke er nødvendig. Radiser kræver ikke særlig meget næring, men må til gengæld ikke mangle vand. Vand lidt og ofte, så de radiserne ikke bliver træede og stærke. Spis radiserne, når de er nyhøstede, så får du mest smag ud af dem.</textarea>

                </article>
            </form>
        </div>
    </form>
    <!-- Bootstrap5 Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>