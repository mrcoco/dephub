DELETE FROM tb_program WHERE id IN ( 30, 53, 66, 83, 74, 75, 79, 80 );

DELETE FROM `tb_sarpras_alokasi_asrama` WHERE id_program IN ( 30, 53, 66, 83, 74, 75, 79, 80 );

DELETE FROM `tb_sarpras_pemakaian_kamar` WHERE id_program IN ( 30, 53, 66, 83, 74, 75, 79, 80 );

DELETE FROM `tb_sarpras_pemakaian_kelas` WHERE id_program IN ( 30, 53, 66, 83, 74, 75, 79, 80 );

DELETE FROM `tb_schedule` WHERE id_program IN ( 30, 53, 66, 83, 74, 75, 79, 80 );

DELETE FROM `dephub_simdik`.`tb_pemateri` WHERE `tb_pemateri`.`id` =15;

DELETE FROM `dephub_simdik`.`tb_pemateri` WHERE `tb_pemateri`.`id` =17;

DELETE FROM `dephub_simdik`.`tb_schedule` WHERE `tb_schedule`.`id` =50;

DELETE FROM `dephub_simdik`.`tb_schedule` WHERE `tb_schedule`.`id` =52;

DELETE FROM `dephub_simdik`.`tb_schedule` WHERE `tb_schedule`.`id` =53;

DELETE FROM `dephub_simdik`.`tb_schedule` WHERE `tb_schedule`.`id` =54;