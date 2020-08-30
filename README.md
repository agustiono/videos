# videos

- running on LINUX OS [testing on lubuntu 20.04] base on ubuntu 20.04
- root server page /var/www/html --- symbolic link to ---> /home/user/public_html
- root file videos.php --> /home/user/public_html/media/videos.php
- root directory for (video).mp4 file /home/user/public_html/media/videos/directory_video
  schema directory
  <pre>
   ----/public_html/media ----+----> folder_01--+-->video_00.mp4
                              |                 +-->video_01.mp4 ..etc
                               ----> folder_02--+-->video_f00.mp4
                                                +-->video_f01.mp4
 </pre>                                               
- no database requiretment.

- just for private notes
