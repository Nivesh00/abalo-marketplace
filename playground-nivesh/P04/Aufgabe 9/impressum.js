export default {
    template:
        `
        <div><h1>Impressum</h1></div>
        <div>
        <b>Angaben gem. § 5 TMG:</b><br/>
        Selim Ülker<br/>
        Nivesh Ramlochun<br/>
        Eupener Straße, 70,
        52062, Aachen
        </div>
        <div>
        <b>Kontaktaufnahme:</b><br/>
        Telefon: +49 1234 56789123<br/>
        Fax: XXXXXX<br/>
        E-Mail: 
        <a href="mailto:selim.uelker@alumni.fh-aachen.de">Selim Ülker</a>, 
        <a href="mailto:ramlochun.nivesh@alumni.fh-aachen.de">Nivesh Ramlochun</a><br/>
        </div>
        <br/><br/>
        <div>{{ message }}</div>
        `,
    data(){
        return{
            message: `
                Haftungsausschluss – Disclaimer:
                Haftung für Inhalte
                Alle Inhalte unseres Internetauftritts wurden mit größter Sorgfalt und nach 
                bestem Gewissen erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können 
                wir jedoch keine Gewähr übernehmen. Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf 
                diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter 
                jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach 
                Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder 
                Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt.
                Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntniserlangung einer konkreten Rechtsverletzung 
                möglich. Bei Bekanntwerden von den o.g. Rechtsverletzungen werden wir diese Inhalte unverzüglich entfernen.
                Haftungsbeschränkung für externe Links
                Unsere Webseite enthält Links auf externe Webseiten Dritter. Auf die Inhalte dieser direkt oder indirekt verlinkten 
                Webseiten haben wir keinen Einfluss. Daher können wir für die „externen Links“ auch keine Gewähr auf Richtigkeit 
                der Inhalte übernehmen. Für die Inhalte der externen Links sind die jeweilige Anbieter oder Betreiber (Urheber) der 
                Seiten verantwortlich.
                Die externen Links wurden zum Zeitpunkt der Linksetzung auf eventuelle Rechtsverstöße überprüft und waren im 
                Zeitpunkt der Linksetzung frei von rechtswidrigen Inhalten. Eine ständige inhaltliche Überprüfung der externen Links 
                ist ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht möglich. Bei direkten oder indirekten Verlinkungen auf 
                die Webseiten Dritter, die außerhalb unseres Verantwortungsbereichs liegen, würde eine Haftungsverpflichtung ausschließlich 
                in dem Fall nur bestehen, wenn wir von den Inhalten Kenntnis erlangen und es uns technisch möglich und zumutbar wäre, die Nutzung 
                im Falle rechtswidriger Inhalte zu verhindern.
                Diese Haftungsausschlusserklärung gilt auch innerhalb des eigenen Internetauftrittes „Name Ihrer Domain“ gesetzten Links und 
                Verweise von Fragestellern, Blogeinträgern, Gästen des Diskussionsforums. Für illegale, fehlerhafte oder unvollständige 
                Inhalte und insbesondere für Schäden, die aus der Nutzung oder Nichtnutzung solcherart dargestellten Informationen entstehen, 
                haftet allein der Diensteanbieter der Seite, auf welche verwiesen wurde, nicht derjenige, der über Links auf die jeweilige 
                Veröffentlichung lediglich verweist.
                Werden uns Rechtsverletzungen bekannt, werden die externen Links durch uns unverzüglich entfernt.`
        }
    }
}