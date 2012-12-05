
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Histori Pinjaman <?php echo $loan[0]['nama'] ?></h3>
			<?php if(count($loan)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th >No Pinjaman</th>
                                    
                                    <th>Buku</th>
                                    <th>Tanggal</th>
                                    <th>Sampai</th>
                                    <th>Kembali</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($loan as $number => $n):?>
                                <tr>
                                    
                                    <td><?php echo $loan[$number]['id'];?></td>
                                    
                                    <td><?php echo $loan[$number]['title'];?></td>
                                    <td><?php echo $loan[$number]['loandate'];?></td>
                                    <td><?php echo $loan[$number]['duedate'];?></td>
                                    <td><?php echo $loan[$number]['returndate']; //echo $loan[$number]['returndate'];?></td>
                                    
                                </tr>
                                
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				
