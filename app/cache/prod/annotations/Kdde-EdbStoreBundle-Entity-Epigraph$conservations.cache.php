<?php return unserialize('a:2:{i:0;O:31:"Doctrine\\ORM\\Mapping\\ManyToMany":7:{s:12:"targetEntity";s:12:"Conservation";s:8:"mappedBy";N;s:10:"inversedBy";s:10:"epigraphes";s:7:"cascade";a:3:{i:0;s:7:"persist";i:1;s:5:"merge";i:2;s:6:"remove";}s:5:"fetch";s:4:"LAZY";s:7:"indexBy";N;s:5:"value";N;}i:1;O:30:"Doctrine\\ORM\\Mapping\\JoinTable":5:{s:4:"name";s:22:"conservazione_epigrafe";s:6:"schema";N;s:11:"joinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":9:{s:4:"name";s:11:"id_epigrafe";s:9:"fieldName";N;s:20:"referencedColumnName";s:6:"id_edb";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:8:"onUpdate";N;s:16:"columnDefinition";N;s:5:"value";N;}}s:18:"inverseJoinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":9:{s:4:"name";s:16:"id_conservazione";s:9:"fieldName";N;s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:8:"onUpdate";N;s:16:"columnDefinition";N;s:5:"value";N;}}s:5:"value";N;}}');