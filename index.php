<?php

require 'vendor/autoload.php';

    // rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false,   //__DIR__ . '/tmp'
        'debug' => true,

    ]);
    $twig->addExtension(new Twig_Extension_Debug());

    $datas = [
        "students" => [
        [
            "firstname" => "DURON",
            "lastname" => "Stacy",
            "address" => [
                "street" => "rue de l'ACS",
                "numero" => "12",
                "zipcode" => 39000,
                "city" => "Lons-le-Saunier",
                "country" => "France"
            ]
        ],
            [
            "firstname" => "SAULEY",
            "lastname" => "Pierre",
            "address" => [
                "street" => "rue de fedora",
                "zipcode" => 39100,
                "city" => "Dole",
                "country" => "France"
                ]
            ],
            [
            "firstname" => "CARREY",
            "lastname" => "Raphaël",
            "address" => [
                "street" => "boulevard de l'ES6",
                "numero" => "42",
                "zipcode" => 39100,
                "city" => "Dole",
                "country" => "France"
                ]
            ]
        ],

        "coachs" => [
            [
                "firstname" => "LOUIS",
                "lastname" => "Morgane",
                "skills" => [
                    "design", "wireframing", "frontend", "photoshop"
                ],
                "birthdate" => new DateTime('1990-10-10')
            ],
            [
                "firstname" => "TOURNIER",
                "lastname" => "Anthony",
                "skills" => [
                    "pas design", "php", "backend", "linux"
                ],
                "birthdate" => new DateTime('1990-10-20')
            ]   
        ]
    ];
    


        echo "<section class='container'>";
        //students FOREACH
        echo "<h2>FOREACH</h2>
        <table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> Address </th>"; 
            
            foreach($datas['students'] as $students ){

                echo "<tr>
                <td>". $students['firstname']."</td>
                <td>". $students['lastname']."</td>";
                $address = $students['address'];
                $printAddress = implode(", " ,$address);
                echo "<td> ".$printAddress."</td>
                <tr>";
                
            };
        echo "</table><br>";
        
        
        // Coachs Foreach
        
        echo "<table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> skills </th>
            <th> birthdate </th>";
            
            foreach($datas['coachs'] as $coachs ){
                
                echo "<tr>
                <td>". $coachs['firstname']."</td>
                <td>". $coachs['lastname']."</td>";
                
                $skills = $coachs['skills'];
                $printSkills = implode(", " , $skills);
                echo "<td> ".$printSkills."</td>";
                
                $birthDate = $coachs['birthdate'];
                echo "<td>". $birthDate->format('m/d/Y')."</td>
                
                <tr>";
                
            };
        echo "</table><br>";
        
        
        // students FOR
        
        echo "<h2>FOR</h2>
        <table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> Address </th>";
            
            $countStudents = count($datas['students']);
            $students = $datas['students'];
            
            for($s=0; $s<$countStudents; $s++) { 
                
                echo "<tr>
                <td>".$students[$s]['firstname']."</td>
                <td>".$students[$s]['lastname']."</td>";
                
                $address = $students[$s]['address'];
                $printAddress = implode(", " ,$address);
                echo "<td> ".$printAddress."</td>
                <tr>";
            }; 
        echo "</table><br>";
        
        // coachs FOR
        
        echo "<table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> skills </th>
            <th> birthdate </th>";
            
            $countCoachs = count($datas['coachs']);
            $coachs = $datas['coachs'];
            
            for($c=0; $c<$countCoachs; $c++) {
                
                echo "<tr>
                <td>". $coachs[$c]['firstname']."</td>
                <td>". $coachs[$c]['lastname']."</td>";
                
                $skills = $coachs[$c]['skills'];
                $printSkills = implode(", " , $skills);
                echo "<td> ".$printSkills."</td>";
                
                $birthDate = $coachs[$c]['birthdate'];
                echo "<td>". $birthDate->format('v')."</td>
                
                <tr>";
            };
        echo "</table><br>";
        
        
        // students WHILE

        echo "<h2>WHILE</h2>
        <table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> Address </th>";
            
            $countStudents = count($datas['students']);
            $students = $datas['students'];
            $s=0;

            while($s<$countStudents){
                echo "<tr>
                <td>".$students[$s]['firstname']."</td>
                <td>". $students[$s]['lastname']."</td>";
                
                $address = $students[$s]['address'];
                $printAddress = implode(", " ,$address);
                echo "<td> ".$printAddress."</td>
                <tr>";
                $s++;
            }; 
        echo "</table><br>";

        // coachs WHILE

        echo "<table class='table' >
            <th> Firstname </th>
            <th> Lastname </th>
            <th> skills </th>
            <th> birthdate </th>";
            
            $countCoachs = count($datas['coachs']);
            $coachs = $datas['coachs'];
            $c=0;

            while($c<$countCoachs){
                echo "<tr>
                <td>". $coachs[$c]['firstname']."</td>
                <td>". $coachs[$c]['lastname']."</td>";
                
                $skills = $coachs[$c]['skills'];
                $printSkills = implode(", " , $skills);
                echo "<td> ".$printSkills."</td>";
                
                $birthDate = $coachs[$c]['birthdate'];
                echo "<td>". $birthDate->format('m/d/Y')."</td>
                
                <tr>";
                $c++;
            };
        echo "</table><br><br>
        </section>";

    
    echo $twig->render('home.html', array(
        'students' => $datas['students'],
        'coachs' => $datas['coachs'],
    ));                       
                        
                        
?>