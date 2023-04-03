<html>

<head>
    <title>MLC</title>
    <link href="../../../app-assets/css/print.css" rel="stylesheet" type="text/css">
    <style>
    body,
    table,
    tr,
    td {
        font-family: sans-serif;
        font-size: 12px;
    }

    .fontBoldLrg {
        font: bold 15px sans-serif;
    }

    .fontMed {
        font: normal 12px sans-serif;
    }
    @page {
        size: A4;
    }
    </style>
</head>

<body>
    <center>
        <table width="760" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td align="center">
                        ατρικο Πιστοποιητικο Προσ Ναυτολογηση <br>
                        Medical Certificate For Signing On
                    </td>
                </tr>
                <tr>
                    <table width="760" cellspacing="0" cellpadding="10" class="brdTable">
                        <tbody>
                            <tr>
                                <td style="background-color: whitesmoke;" rowspan="2" align="center">
                                    Επωνυμο <br>
                                    Last name
                                </td>
                                <td>{{$admission->patient->lastname}}</td>
                                <td rowspan="2" align="center" style="background-color: whitesmoke;">Ονομα <br>
                                    First Name
                                </td>
                                <td>{{$admission->patient->firstname}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="background-color: whitesmoke;" rowspan="2" align="center">
                                    Μεσαιο Ονομα <br>
                                    Middle Name
                                </td>
                                <td>{{$admission->patient->middlename}}</td>
                                <td rowspan="2" align="center" style="background-color: whitesmoke;">
                                    Εθνικοτητα <br>
                                    Nationality
                                </td>
                                <td>{{$admission->patient->patientinfo->nationality}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="background-color: whitesmoke;" rowspan="2" align="center">
                                    Τοπος Γεννησης <br>
                                    Place Of Birth
                                </td>
                                <td>{{$admission->patient->patientinfo->birthplace}}</td>
                                <td rowspan="2" align="center" style="background-color: whitesmoke;">
                                    Ημ/Νια Γεννησης <br>
                                    Date Of Birth
                                </td>
                                <td>{{date_format(new DateTime($admission->patient->patientinfo->birthdate), "d F Y")}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="background-color: whitesmoke;" rowspan="2" align="center">
                                    Τοπος Κατοικιας <br>
                                    Home Address
                                </td>
                                <td>{{$admission->patient->patientinfo->address}}</td>
                                <td rowspan="2" align="center" style="background-color: whitesmoke;">
                                    Φυλο <br>
                                    Gender
                                </td>
                                <td rowspan="2">{{$admission->patient->gender}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="background-color: whitesmoke;" rowspan="2" colspan="2" align="left">
                                    Αριθμος Ναυτικου Φυλλαδιου (Μ.Ε.Θ.) Ή Διαβατηριου <br>
                                    (Διαγραφεται Αναλογως) <br>
                                    Seafarer’s Book No. Or Seafarer’s Identity Document Or <br>
                                    Passport No <span></span> <br>
                                    Τοπος Ημ/Νια Εκδοσης <br>
                                    Place Date Of Issue <span></span>
                                </td>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="10" style="margin-top: 2rem;">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="font-size: 15px; font-weight: 700;">
                                            Ο κάτωθι υπογεγραμμένος ιατρός δηλώνω ότι:
                                        </div>
                                        <div>The undersigned medical practitioner hereby declares that:</div>
                                        <div style="font-size: 13px; font-weight: 700;">Είμαι ως νόμιμος κάτοχος άδειας
                                            άσκησης του ιατρικού επαγγέλματος με ειδίκευση στη <span
                                                style="border-bottom: 1px solid black; margin-left: 1rem;">{{$admission->patient->firstname}} {{$admission->patient->middlename[0]}}. {{$admission->patient->lastname}}</span></div>
                                        <div style="font-size: 13px; font-weight: 700;">ισάγετε γενική ιατρική ή
                                            παθολογία ή ιατρική της εργασίας],</div>
                                        <div style="font-size: 13px; font-weight: 700;">Δεόντως εξουσιοδοτημέμος από την
                                            Ελληνική Κυβέρνηση (Υπουργείο Ναυτιλίας και Αιγαίου) για την έκδοση του
                                        </div>
                                        <div style="font-size: 13px; font-weight: 700;">παρόντος πιστοποιητικού.</div>
                                        <div>I am as a licensed medical practitioner in the area of <span
                                                style="border-bottom: 1px solid black; margin-left: 2rem;">OCCUPATIONAL
                                                MEDICINE</span></div>
                                        <div width="100%"
                                            style="display: flex; align-items: center; justify-content: center;">
                                            <div style="border-bottom: 1px solid black; width: 50%">&nbsp;</div>
                                            <div>[insert general medicine or pathology or occupational medicine]</div>
                                        </div>
                                        <div>duly authorized by the Hellenic Government (Ministry of Shipping, Maritime
                                            Affairs and the Aegean) for issuing the present certificate.</div>
                                        <div style="font-size: 13px; font-weight: 700;">Μετά τον έλεγχο στο χώρο τηε
                                            εξέτασης των εγγράφων ταυτοπροσωπίας του ναυτικού τα στοιχεία του οποίου
                                            αναφέρονται παραπάνω,
                                            αξιολόγησα απολαμβάνοντας πλήρη επαγγελματική ανεξαρτησία τον/την ανωτέρω
                                            ναυτικό σύμφωνα με τις οικείες διατάξεις της Σύμβασης
                                            Ναυτικής Εργασίας, 2006 και της Διεθνούς Σύμβασης για Πρότυπα Εκπαίδευσης,
                                            Έκδοσης Πιστοποιητικών και Τήρησης Φυλακών των Ναυτικών.</div>
                                        <div>After having checked at the point of examination the identification
                                            documents of the seafarer the personal details of whom are referred above,
                                            I have evaluated him / her enjoying full professional independence according
                                            to the relevant provisions of Maritime Labour Convention,
                                            2006 and the International Convention On Standards of Training,
                                            Certification and Watch keeping for Seafarers 1978 as amended in 1995.</div>
                                        <div>Με βάση τα αποτελέσματα της εξέτασης, πιστοποιώ ότι ο/η ανωτέρω ναυτικός
                                            ευρέθη να είναι μέχρι την ημερομηνία λήξης ισχύος
                                            του παρόντος, που αναφέρεται στην όπισθεν σελίδα:</div>
                                        <div>On the basis of the examination results, I certify that the aforementioned
                                            seafarer has been found until the date of expiry
                                            of the validity of this certificate as shown overleaf:</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="10" class="brdTable" style="margin-top: 1rem;">
                            <tbody>
                                <tr>
                                    <td align="center" style="background-color: whitesmoke;">
                                        Ικανός <br>
                                        Fit
                                    </td>
                                    <td align="center" style="background-color: whitesmoke;">Υπηρεσία Καταστρώματος <br>
                                        Deck Service</td>
                                    <td align="center" style="background-color: whitesmoke;">Υπηρεσία Μηχανοστασίου <br>
                                        Engine Service</td>
                                    <td align="center" style="background-color: whitesmoke;">Γενικών Υπηρεσιών
                                        <br>General Service
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">☐</td>
                                    <td align="center">☐</td>
                                    <td align="center">☐</td>
                                    <td align="center">☐</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="760" cellspacing="0" class="brdTable" cellpadding="10">
                            <tbody>
                                <tr>
                                    <td style="background-color: whitesmoke;">Καθήκοντα Φυλακής Οπτήρα <br> Look-out
                                        Duty</td>
                                    <td>☐ Επαρκής για Καθήκοντα <br> Sufficient for Duties</td>
                                    <td>☐ Μη Επαρκής για Καθήκοντα <br> Not Sufficient for Duties</td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;">Οπτική Οξύτητα <br> (για όλους τους
                                        ναυτικούς) <br> Visual Acuity <br>(for all seafarers)</td>
                                    <td colspan="2" align="center">Επαρκής για καθήκοντα <br> Sufficient for Duties</td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;">Εκπληρώνει τα πρότυπα της STCW A-I/9 <br>
                                        (μόνο για κατηγορίες ναυτικών του πίνακα Α-Ι/9 της STCW)
                                        <br> Meets the standards in STCW A-I/9 <br>only for categories of seafarers of
                                        STCW Table A-I/9)
                                    </td>
                                    <td colspan="2" align="center">Ναι / Οχι <br> (διαγράφεται αναλόγως) <br> YES/ No
                                        <br> (delete as appropriate)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;">Οπτική Οξύτητα <br> (για όλους τους
                                        ναυτικούς) <br> Visual Acuity <br>(for all seafarers)</td>
                                    <td colspan="2" align="center">Επαρκής για καθήκοντα <br> Sufficient for Duties</td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" cellspacing="0" cellpadding="10" class="brdTable" style="margin-top: 3rem;">
                            <tbody>
                                <tr>
                                    <td width="25%" style="background-color: whitesmoke;">
                                        Ικανότητα Διάκρισης Χρωμάτων <br>
                                        μόνο για κατηγορίες ναυτικών του πίνακα Α-Ι/9 της STCW) <br>
                                        Color Vision <br>
                                        (only for categories of seafarers of STCW Table A-I/9)
                                    </td>
                                    <td width="25%" align="center">Επαρκής για καθήκοντα <br> Sufficient for duties</td>
                                    <td width="25%" style="background-color: whitesmoke;">
                                        Εκπληρώνει τα πρότυπα της STCW A-I/9 <br>
                                        (για κατηγορίες ναυτικών σύμφωνα με πίνακα Α-Ι/9) <br>
                                        Meets the standards in STCW A-I/9 <br>
                                        (for categories of seafarers according to Table A-I/9)
                                    </td>
                                    <td width="25%" align="center">
                                        Ναι / Οχι <br>
                                        (διαγράφεται αναλόγως) <br>
                                        Yes / No <br>
                                        (delete as appropriate)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;" colspan="2">
                                        Ημερομηνία τελευταίας εξέτασης διάκρισης χρωμάτων <br>
                                        Date of Last Color Vision Test
                                    </td>
                                    <td align="center" colspan="2">
                                        09/11/2020<br>
                                        (ημέρα / μήνας / έτος) <br>
                                        (day / month / year)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;">
                                        Ακοή <br>
                                        (Για όλους τους Ναυτικούς) <br>
                                        Hearing <br>
                                        (for all seafarers)
                                    </td>
                                    <td align="center">Επαρκής για καθήκοντα <br> Sufficient for duties</td>
                                    <td style="background-color: whitesmoke;">
                                        Εκπληρώνει τα πρότυπα της STCW A-I/9 <br>
                                        (για κατηγορίες ναυτικών σύμφωνα με πίνακα Α-Ι/9) <br>
                                        Meets the standards in STCW A-I/9 <br>
                                        (for categories of seafarers according to Table A-I/9)
                                    </td>
                                    <td align="center">
                                        Ναι / Οχι <br>
                                        (διαγράφεται αναλόγως) <br>
                                        Yes / No <br>
                                        (delete as appropriate)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: whitesmoke;">
                                        Υποβοηθούμενη Ακοή <br> Hearing Aid
                                    </td>
                                    <td align="center" colspan="3">
                                        Ναι / Οχι <br>
                                        (διαγράφεται αναλόγως) <br>
                                        Yes / No <br>
                                        (delete as appropriate)
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Ιατρική πάθηση που ενδέχεται να επιδεινωθεί λόγω της υπηρεσίας στη
                                        θάλασσα ή
                                        να καταστήσει το ναυτικό ακατάλληλο για αυτήν την υπηρεσία ή να θέσει σε κίνδυνο
                                        την υγεία άλλων ατόμων επί του πλοίου
                                        <br>
                                        Medical condition likely to be aggregated by service at sea or to render the
                                        seafarer
                                        unfit for such service or to endanger the health of the persons on board
                                    </td>
                                    <td colspan="2">
                                        Ναι / Οχι <br>
                                        (διαγράφεται αναλόγως) <br>
                                        Yes / No <br>
                                        (delete as appropriate)
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: whitesmoke;">
                                        Χωρίς περιορισμούς Without Restrictions
                                        (διαγράφεται αναλόγως / Delete as appropriate
                                    </td>
                                    <td style="background-color: whitesmoke;" colspan="2">
                                        Με περιορισμούς With Restrictions
                                        (διαγράφεται αναλόγως / Delete as appropriate)

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Περιγραφή περιορισμών (π.χ. τύπος πλοίου, περιοχή πλόων, ασθένειες,
                                        θεραπείες, ατυχήματα, θέση / ειδικότητα)
                                        Describe restrictions on fitness (e.g. type of ship, trading area, illnesses,
                                        treatments, accidents, position / occupation
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan="4">Έως (συμπληρώνεται στην περίπτωση που επιβεβλημένοι περιορισμοί
                                        λήγουν πριν την ημεριμηνία λήξης ισχύος του παρόντος:</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Until (to be completed in the case of imposed limitations expire at
                                        an earlier date from the expiration date of the present):</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760">
                            <tbody>
                                <tr>
                                    <td>Το παρόν πιστοποιητικό ισχύει για χρονική περίοδο που δεν υπερβαίνει: This
                                        certificate remains valid for a period not exceeding:</td>
                                </tr>
                                <tr>
                                    <td height="50">
                                        ☐ τα δύο έτη / two years ☐ το ένα έτος (ναυτικός κάτω των δεκαοκτώ χρονών) / One
                                        year (seafarer under the age of 18)
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" height="50">
                                        Έως (ημέρα / μήνα / έτος) <b><u>08/11/2022</u></b> <br>
                                        Until (day / month / year)
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50">Τόπος Εξέτασης <b><u>PHILIPPINES </u></b> Ημερομηνία Εξέτασης:
                                        (ημέρα / Μήνας / Έτος) <b><u>09/11/2020</u></b> <br>
                                        Place of Examination <b><u>PHILIPPINES </u></b> Date of Examination (Day / Month
                                        / Year)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="760" style="margin: 100px 0px;">
                            <tbody>
                                <tr>
                                    <td width="50%" align="right">Σφραγίδα <br>(τύπωση ονοματεπώνυμου) <br> Stamp
                                        <br>(print name of medical examiner)
                                    </td>
                                    <td width="50%">
                                        <div style="border: 1px solid black; padding: 1rem;">
                                            <div></div>
                                            TERESITA F. GONZALES M.D
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%"></td>
                                    <td align="left" width="50%">
                                        <div
                                            style="width: 70%; display: flex; align-items: flex-end; justify-content: space-between;">
                                            <div> Υπογραφή Ιατρού <br> Signature of medical examiner</div>
                                            <div style="width: 100%; border-bottom: 1px solid black;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Βεβαιώνω ότι έχω λάβει γνώση για το περιεχόμενο του πιστοποιητικού και του
                                        δικαιώματος επανεξέτασης. <br>
                                        I confirm that I have been informed of the content of the certificate and of the
                                        right to a review.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="100" align="left" width="50%">
                                        <div
                                            style="width: 100%; display: flex; align-items: flex-end; justify-content: space-between;">
                                            <div> Όνομα και Υπογραφή Ναυτικού: <br> Seafarer’s Name and Signature:</div>
                                            <div style="width: 50%; border-bottom: 1px solid black;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%"></td>
                                    <td width="50%" align="right">
                                        <div style="background-color: whitesmoke; padding: 1rem; font-size: 10px;">
                                            ΦΥΛΑΣΣΕΤΑΙ ΜΕ ΠΡΟΣΟΧΗ ΜΕΤΑ ΤΗ ΣΥΜΠΛΗΡΩΣΗ <br>
                                            TO BE KEPT WITH CARE AFTER COMPLETION
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>

</body>

</html>
