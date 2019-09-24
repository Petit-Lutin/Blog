<?php
echo password_hash("écrivaincélèbre", PASSWORD_DEFAULT);
echo password_verify("écrivaincélèbre", '$2y$10$0cFaLeU3f9TtWd8Fm9MWBufPW/umfA8CF.kjBxm6Ie3s7.8ShzLZK');
