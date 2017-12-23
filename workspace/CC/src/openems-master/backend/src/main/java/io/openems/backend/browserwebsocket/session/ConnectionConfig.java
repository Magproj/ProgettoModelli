import java.util.Optional;

public class ConnectionConfig {

	private String userName = "";
	private Optional<Integer> userId = Optional.empty();
	
	public String getUserName(){
		
		return userName;
	}
	
	public Optional<Integer> getUserId(){
		
		return userId;
	}
	
}
