SQLite format 3   @    �                                                            � -�5  � �@�<�9 �                                                     StableoptionsoptionsCREATE TABLE "options" ( id TEXT PRIMARY KEY, value TEXT)-A indexsqlite_autoindex_options_1options	   ��tabledatadataCREATE TABLE "data" ( id INTEGER PRIMARY KEY AUTOINCREMENT, dataset_id INTEGER, attribute_id INTEGER, value TEXT, time INTEGER)j�#tableattributeattributeCREATE TABLE "attribute" ( id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT)�!!�tableentitydataentitydataCREATE TABLE "entitydata" ( id INTEGER PRIMARY KEY AUTOINCREMENT, entity_id INTEGER, attribute_id INTEGER, defaultValue TEXT)a�tableentityentityCREATE TABLE "entity" ( id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT)P++Ytablesqlite_sequencesqlite_sequenceCREATE TABLE sqlite_sequence(name,seq)l�/tabledatasetdatasetCREATE TABLE "dataset" ( id INTEGER PRIMARY KEY AUTOINCREMENT, entity_id INTEGER)   � ��������tttttttttttt                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        �K   �K   �K   �K   �K   �K   �K   �K   �K   �K   �K   �K   �L   �L   ~L   wL   pL   iL   bL   [L   TL   ML   FK   ?K   8   *     $                    �# �� 1� ������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      dataset �attribute �!entitydata ����   data �	data �entity�   � ��������%%%%%%%%%%%%%%%%%%%%%%%%%%����������������������������������������������������������������������������������<60*$  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  T 	 aaa  �       �                                                                                                                                                                                                                                                                                                                                                       �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     �     ~     x     r     l     f     `     Z     T     N     H     B     <     6      $            �C  �B  �A  �* empty�1 +Testpage Entity   � ���������||pd��������������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              [ ? +[ 6 +[ -	+was[ "	+das[ 	+das[ +123   �  �	   �  �   �  �   �  �   �  �   �  �   �m    H  1 �    1 �   $ 1 �    1 �    � �	�% 1 �	� 1 �	� 1 �	� 1 �	� 1 �	� 1 �	� 1 �	� 1 �� �	�������~~~~~~$$$$$$$$$$$$$$$PPP�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               �  'new Att� r  � l  � f  � `  � Z  � T  � N  � H  � B  � <  � 6  � 0  � *  � $  �   �   �   �   �   � #amazon user� age� #facebook id� gps	� height� power�
 name                  � t t������cc�������]N?0! � � � � � � � � �          i J �T�2Zh I �T�2	g I �T�2	f H �T�1�e H �T�1�d G �T�1�c G �T�1�b F �T�1ra F �� c �T�G��� c �T�G��� b �T�G��y b �T�G��i a �T�G��Y a �T�G��I ` �T�G��9 ` �T�G��) _ �T�G�� _ �T�G��	 ^ �T�G�� � ^ �T�G�� � ] �T�G�� � ] �T�G�� � \ �T�G�� � \ �T�G�� � [ �T�G�� � [ �T�G�� � Z �T�G�� y Z �T�G�� i Y �T�G�� Y Y �abcT�G�� F X �T�G�� 6 X �abcT�G�� # W �T�G��  W �abcT�G�� , �T�$�� , �T�$�� - �T�&2` ]- �T�&2`   { �T�V�   � { �T�V�   � z �T�V�   � z �T�V�   �   �                �                �     �    � �T��6�X  � �JohnT����^  � �T����    � �T����\  � �T����[  � �T���   3  � �T���     � �T���      � �T��                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              {  � ����l]N?0! � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � � �             i J �T�2Zh I �T�2	g I �T�2	f H �T�1�e H �T�1�d G �T�1�c G �T�1�b F �T�1ra F �T�1r` E �T�1_ E �T�1^ D �T�1] D �T�1\ C �T�0�[ C �T�0�Z B �T�0�  IB �T�0�  :A �T�.�  +A �T�.�  @ �T�.�  @ �T�.�  �? �T�.u  �? �T�.u  �> �T�.?  �> �T�.?  �= �T�-�  �= �T�-�  �< �T�-�  �< �T�-�  �; �T�-�  w; �T�-�  h: �T�-t  Y: �T�-t  J9 �T�-0  ;9 �T�-0  ,8 �T�,�  8 �T�,�  7 �T�,N   �7 �T�,N   �6 �T�,G   �6 �T�,G   �5 �T�,9   �5 �T�,9   �4 �T�&�   �4 �T�&�   �3 �T�&�   �3 �T�&�   x2 �T�&�   i2 �T�&�   Z1 �T�&�   K1 �T�&�   <0 �T�&~   -0 �T�&~   . �T�&R   . �T�&R2 - �T�&21 - �T�&20 , �T�$�/ , �T�$�   d� ��������������� &,28>DJPV\bhntz����������������������
"(.4:@FLRX^djpv|������������������������������������HB<60*$�:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �H  �I  �J  �K  �L  �L  �M  �M  �N  �O  �P  �Q  �R  �S  �T  �
  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �   �!  �"  �#  �$  �%  �&  �'  �(  �)  �*  �+  �,  �-  �.  �/  �0  �1  �2  �3  �4  �5  �6  �7  �8  �9  �:  �;  �<  �=  �>  �?  �@  �A  �B  �C  �D  �E  �F  �G  �H  �I  �J  �K  �L  �M  �N  �O  �P  �Q  �R  �S  �T  �U  �V  �W  �X  �Y  �Z  �[  �\  �]  �^  �_  �`  �a  �b  �c  �d  �e  �f  �g  �h  �i  �j  �k  �l  �m                                                         
����������
"(.4:@FLRX^djpv|������������������������������������������~xrlf`ZTNHB<60*$�_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �   �!  �"  �#  �$  �%  �&  �'  �(  �)  �*  �+  �,  �-  �.  �/  �0  �1  �2  �3  �4  �5  �6  �7  �8  �9  �:  �;  �<  �=  �>  �?  �@  �A  �B  �C  �D  �E  �F  �G  �H  �I  �J  �K  �L  �M  �N  �O  �P  �Q  �R  �S  �T  �U  �V  �W  �X  �Y  �Z  �[  �\  �]  �^  �_     � ���                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     l K �T�2�k K �T�2�j J �T�2Z   K> >DJPV\bhntz����������������������
"(.4:@FLRX^djpv|���������������������82,& ���������������������~xrlf`ZTNHB<60*$�]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �  �  �  �  �  �  �  �  �  �  �  �  �  �   �!  �"  �#  �$  �%  �&  �'  �(  �)  �*  �+  �,  �-  �.  �/  �0  �1  �2  �3  �4  �5  �6  �7  �8  �9  �:  �;  �<  �=  �>  �?  �@  �A  �B  �C  �D  �E  �F  �G  �H  �I  �J  �K  �L  �M  �N  �O  �P  �Q  �R  �S  �T  �U  �V  �W  �X  �Y  �Z  �[  �\  �]      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\     JD DJPV\bhntz����������������������
"(.4:@FLRX^djpv|���������������������>82,& ���������������������~xrlf`ZTNHB<60*$�Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �   �!  �"  �#  �$  �%  �&  �'  �(  �)  �*  �+  �,  �-  �.  �/  �0  �1  �2  �3  �4  �5  �6  �7  �8  �9  �:  �;  �<  �=  �>  �?  �@  �A  �B  �C  �D  �E  �F  �G  �H  �I  �J  �K  �L  �M  �N  �O  �P  �Q  �R  �S  �T  �U  �V  �W  �X  �Y      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�;  �:  �9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�9  �8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�8  �7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:     JD DJPV\bhntz����������������������
"(.4:@FLRX^djpv|���������������������>82,& ���������������������~xrlf`ZTNHB<60*$�7  �6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �n  �o  �p  �q  �r  �s  �t  �u  �v  �w  �x  �y  �z  �{  �|  �}  �~  �  �   �  �  �  �  �  �  �  �  �	  �
  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �   �!  �"  �#  �$  �%  �&  �'  �(  �)  �*  �+  �,  �-  �.  �/  �0  �1  �2  �3  �4  �5  �6  �7      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�6  �5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8      ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>82,& ���������������������~xrlf`ZTNHB<60*$�5  �4  �3  �2  �1  �0  �/  �.  �-  �,  �+  �*  �)  �(  �'  �&  �%  �$  �#  �"  �!  �   �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �  �
  �	  �  �  �  �  �  �  �  �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7     L8 ���������������������|vpjd^XRLF@:4.("
����������������������ztnhb\VPJD>8                                                                                                                                                                                                                                                                                                                                                                                                                        �  �   �  �~  �}  �|  �{  �z  �y  �x  �w  �v  �u  �t  �s  �r  �q  �p  �o  �n  �m  �l  �k  �j  �i  �h  �g  �f  �e  �d  �c  �b  �a  �`  �_  �^  �]  �\  �[  �Z  �Y  �X  �W  �V  �U  �T  �S  �R  �Q  �P  �O  �N  �M  �L  �K  �J  �I  �H  �G  �F  �E  �D  �C  �B  �A  �@  �?  �>  �=  �<  �;  �:  �9  �8  �7  �6  