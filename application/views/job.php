<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s6 m3">
                <div class="card">
                    <div class="card-header"><span class="card-title">Job : <?php echo substr($job_infos["id"],4);?></span></div>
                    <div class="card-content">
                        <?php
                        /* Time calculation */
                        $start = new DateTime('@'.substr($job_infos["startTime"],0,-3));	
                        $start->setTimezone(new DateTimeZone('Europe/Paris'));
                        $end = new DateTime('@'.substr($job_infos["finishTime"],0,-3));
                        $end->setTimezone(new DateTimeZone('Europe/Paris'));
                        $duration = $start->diff($end);
                        ?>
                            <ul class="collection">
                                <li class="collection-item">
                                    <div><span class="main-content">NAME</span><span class="secondary-content"><?php echo substr($job_infos["name"],0,30);?>
                            </span>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div><span class="main-content">USER</span><span class="secondary-content"><?php echo $job_infos["user"];?></span></div>
                                </li>
                                <?php if($job_infos["state"]=="SUCCEEDED"){
                                ?>
                                    <li class="collection-item">
                                        <div><span class="main-content">STATUS</span><span class="secondary-content green-text"><?php echo $job_infos["state"];?></span></div>
                                    </li>
                                    <?php
                                }else{
                                ?>
                                        <li class="collection-item">
                                            <div><span class="main-content">STATUS</span><span class="secondary-content red-text"><?php echo $job_infos["state"];?></span></div>
                                        </li>
                                        <?php
                                }
                                ?>
                                            <li class="collection-item">
                                                <div><span class="main-content">STARTED</span><span class="secondary-content"><?php echo $start->format('d/m/y H:i:s');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">FINISHED</span><span class="secondary-content"><?php echo $end->format('d/m/y H:i:s');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">DURATION</span><span class="secondary-content"><?php echo $duration->format('%H:%M:%S');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">MAPS</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo$job_infos["mapsCompleted"];?> / <?php echo$job_infos["mapsTotal"];?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">REDUCES</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo$job_infos["reducesCompleted"];?> / <?php echo$job_infos["reducesTotal"];?></span></div>
                                            </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col s6 m9">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#test1">Job attempts</a></li>
                                    <li class="tab col s3"><a href="#test2">Tasks attempts</a></li>
                                </ul>
                            </div>
                            <div class="tabs-content">
                                <div id="test1" class="col s12">
                                    <table class="striped">
                                        <thead>
                                            <tr>
                                                <th data-field="attempt_id">Job attempt ID</th>
                                                <th data-field="container_id">Container ID</th>
                                                <th data-field="node_id">Node ID (Job master)</th>
                                                <th data-field="start">Start time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                    foreach($job_attempts as $ja){
                                    $start_attempt = new DateTime('@'.substr($ja["startTime"],0,-3));
                                    ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $ja["id"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ja["containerId"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ja["nodeId"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ja["startTime"];?>
                                                    </td>
                                                </tr>
                                                <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="test2" class="col s12">
                                    <table class="striped">
                                        <thead>
                                            <tr>
                                                <th data-field="attempt_id">Job attempt ID</th>
                                                <th data-field="container_id">Container ID</th>
                                                <th data-field="node_id">Node ID (Job master)</th>
                                                <th data-field="start">Start time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                    foreach($tasks_attempts as $tasks){
                                        foreach($tasks["taskAttempts"]["taskAttempt"] as $ta){
                                            ?>
                                            
                                            
                                            
                                            <?php
                                        }
                                    }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>